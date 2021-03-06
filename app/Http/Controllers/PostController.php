<?php

namespace App\Http\Controllers;

use App\Address;
use App\Currency;
use App\Post;
use App\PostType;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    protected const postRules = [
        'description'   => 'required|min:10|max:450',
        'type'          => 'required',
        'dwelling_type' => 'required',
        'street'        => 'required',
        'house'         => 'required',
        'city'          => 'required',
        'region'        => 'required',
        'price'         => 'required|min:0',
        'currency'      => 'required',
        'phone'         => 'required',

        'square'        => 'nullable',
        'rooms'         => 'nullable',
        'floor'         => 'nullable',
    ];

    protected const types = [
        'rent'  => [ 'type_id' => 1, 'title' => 'Аренда'],
        'buy'   => [ 'type_id' => 2, 'title' => 'Продажа'],
        'build' => [ 'type_id' => 3, 'title' => 'Новостройки']
    ];

    protected const details_types = [
        'square' =>   ['title' => 'Площадь', 'general' => 0],
        'rooms' =>    ['title' => 'Комнаты', 'general' => 0],
        'floor' =>    ['title' => 'Этаж', 'general' => 0],
        'balcony' =>  ['title' => 'Балкон', 'general' => 1],
        'internet' => ['title' => 'Интернет', 'general' => 1],
        'parking' =>  ['title' => 'Парковочное место', 'general' => 1]
    ];

    public const pagination_vars = [10, 25, 50];

    public const sort_vars = [
        'Сначала новые' => [
            'field' => 'created_at',
            'ord' => 'desc'
        ],
        'Сначала дешевые' => [
            'field' => 'price',
            'ord' => 'asc'
        ],
        'Сначала дорогие' => [
            'field' => 'price',
            'ord' => 'desc'
        ]
    ];

    private static function rigth_field($sort){
        foreach (self::sort_vars as $var){
            if (in_array($sort,$var)) return true;
        }
        return false;
    }

    public function syncPost(Request $request, $id){


        $post = Post::where('id', $id)->first();

        if($post && ($post->user_id == Auth::id() || Auth::user()->role_id == 2 )){

            $data = $request->all();

            if( !in_array( $data ['region'], Region::all()->pluck('region_id')->toArray() )) unset($data['region']);
            if( !in_array( $data ['currency'], Currency::all()->pluck('id')->toArray() )) unset($data['currency']);
            if( !PostType::all()->contains('id', '=', $data['type'])) unset($data['type']);
        }

        $validator = Validator::make($data, self::postRules);

        if ($validator->fails()){

            alert()->error('Не удалось изменить обявление', 'Не удалось изменить обявление, поля заполнены неверно');
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

            $post->description = $data['description'];
            $post->price = $data['price'];
            $post->currency_id = $data['currency'];
            $post->photo = 'single_family_colonial_1.png';
            $post->type_id = $data['type'];
            $post->dwelling_type_id = $data['dwelling_type'];
            $post->save();

            $post->address->street = $data['street'];
            $post->address->house = $data['house'];
            $post->address->city_id =  $data['city'];

            $post->address->save();

            if (!is_null($data['phone_new'])){
                if(!Auth::user()->phone->contains('phone',$data['phone_new'])){
                    $phone = Auth::user()->phone()->create([ 'phone' => $data['phone_new']]);
                    $data['phone'] []= $phone->id;
                }
            }

            $post->user_phone()->sync($data['phone']);

            $details = [
                'square'    => $data['square'  ],
                'rooms'     => $data['rooms'   ],
                'balcony'   => $data['balcony' ],
                'parking'   => $data['parking' ],
                'internet'  => $data['internet'],
            ];

            if(isset($data['floor']) && isset($data['floor_max']) && $data['floor_max'] >= $data['floor']){
                $details ['floor'] = $data['floor'];
                $details ['floor_max'] = $data ['floor_max'];
            }


            $details = array_filter($details,function ($detail){
                return !is_null($detail) && $detail !== "-1";
            });


            if(!empty($details)){
                if(isset($details['square'])) $details['square'] = (float) $details['square'];

                if(is_null($post->details)) $post->details()->create($details);
                else{
                    if(isset($details['square'])) $post->details->square = $details['square']; else $post->details->square = null;
                    if(isset($details['rooms'])) $post->details->rooms = $details['rooms']; else $post->details->rooms = null;
                    if(isset($details['balcony'])) $post->details->balcony = $details['balcony']; else $post->details->balcony = null;
                    if(isset($details['parking'])) $post->details->parking = $details['parking']; else $post->details->parking = null;
                    if(isset($details['internet'])) $post->details->internet = $details['internet']; else $post->details->internet = null;
                    if(isset($details['floor'])) $post->details->floor = $details['floor']; else $post->details->floor = null;
                    if(isset($details['floor_max'])) $post->details->floor_max = $details['floor_max']; else $post->details->floor_max = null;

                    $post->details->save();
                }
            }else $post->details()->delete();

            alert('Объявление изменено', "Обявление {$post->title()} успешно изменено");
            return redirect()->route('post', ['id' => $post->id ]);
        }
    }

    public function editPost($id){

        $post = Post::where('id', $id)->first();

        if($post->user_id == Auth::id() || Auth::user()->role_id == 2 ) return view('Edit', ['post' => $post]);
        else return redirect()->back();
    }

    public function deletePost(Request $request){

        if($request->has('post_id')){

            $post = Post::where('id', $request->input('post_id'))->first();

            if($post->user_id == Auth::id() || Auth::user()->role_id == 2){
                if(Storage::exists($post->id)) Storage::deleteDirectory($post->id);

                alert()->warning("Объявление удалено", "Объявление {$post->title()} удалено");
                $post->delete();
            }
        }

        return redirect()->back();
    }


    public function getUserPosts(Request $request){
        $paginate = $request->input('paginate',10);
        $sort = $request->input('sort','created_at');
        $ord = $request->input('ord','desc');

        return view('UserStock',[
            'Posts' => Post::where('user_id',Auth::id())->orderBy($sort, $ord)->paginate($paginate),
            'pageTitle' => 'Мои обЪявления',
            'pagination_vars' => self::pagination_vars,
            'sort_vars' => self::sort_vars,
            'sort' => $sort,
            'ord' => $ord,
            'paginate' => $paginate,
        ]);
    }

    public function index(){
        return view('Posts', ['Posts' => Post::Latests(), 'title' => 'Последние объявления']);
    }

    public function getPost($id){
        $post = Post::where('id',$id)->first();

        if($post){
            $photos = Storage::files($post->id);
            return view('Post', ['Post' => $post, 'details_types' => self::details_types, 'photos' => $photos]);
        }
        else return redirect()->route('Home');
    }

    public function build(Request $request){
        return $this->stock(__FUNCTION__,$request);
    }

    public function rent(Request $request){
       return $this->stock(__FUNCTION__,$request);
    }

    public function buy(Request $request){
       return $this->stock(__FUNCTION__,$request);
    }

    protected function postFilter($posts,array $filter){

        if ($filter){

            $posts->join('details','posts.id','=','details.post_id')
                  ->join('dwelling_types','posts.dwelling_type_id','=','dwelling_types.dwelling_id')
                  ->join('addresses','posts.id', '=', 'addresses.post_id')
                  ->join('cities','addresses.city_id','=', 'cities.city_id')
                  ->join('regions', 'cities.region_id','=','regions.region_id');

            foreach ($filter as $field => $values){
                switch ($field){
                    case 'city': {
                        if (isset($values)) $posts->whereRaw("addresses.city_id = {$values}"); break;
                    }
                    case 'region':{
                        if (isset($values)) $posts->whereRaw("cities.region_id = {$values}"); break;
                    }
                    case 'price':{
                        if (isset($values['min'])) $posts->where('price','>=',$values['min']);
                        if (isset($values['max'])) $posts->where('price','<=',$values['max']);
                        continue;
                    }
                    case 'square':{
                        if (isset($values['min'])) $posts->where('square','>=',$values['min']);
                        if (isset($values['max'])) $posts->where('square','<=',$values['max']);
                        continue;
                    }
                    case 'dwelling_type_id':{
                        $posts->whereIn($field, $values);
                        continue;
                    }
                    case 'rooms':{
                        if (in_array(5,$values)){
                            $posts->where(function ($query) use ($values,$field) {
                                $query->whereIn($field, $values);
                                $query->orWhere($field,'>=',4);
                            });
                        }
                        else $posts->whereIn($field, $values);
                        continue;
                    }
                    case 'additional':{
                        if(isset($values['middle'])) {
                            $posts->where('floor','>',1);
                            $posts->whereRaw('floor < floor_max');
                            unset($values['middle']);
                        }
                        foreach ($values as $add_field => $value){
                            if ($value > 0) $posts->where($add_field,1);
                        }
                        continue;
                    }
                }
            }
        }

        return $posts;
    }

    protected function stock($method, Request $request){

        $paginate = $request->input('paginate',10);
        $sort = $request->input('sort','created_at');
        $ord = $request->input('ord','desc');

        if(!in_array($paginate, self::pagination_vars)) $paginate = self::pagination_vars[0];

        if(!self::rigth_field($sort)) $sort = 'created_at';

        $Posts = Post::where('type_id', self::types[$method]['type_id']);

        $Posts = $this->postFilter($Posts,$request->input('filter',[]));
        //dd($Posts);

        return view('Stock', [
            'Posts' => $Posts->orderBy($sort, $ord)->paginate($paginate),
            'paginate' => $paginate,
            'sort' => $sort,
            'ord' => $ord,
            'pagination_vars' => self::pagination_vars,
            'sort_vars' => self::sort_vars,
            'pageTitle' => self::types[$method]['title']

        ]);
    }

    public function makePost(){
        if(Auth::user()->state == 0) return view('Add');
        else return redirect()->back();
    }

    public function putPost(Request $request){

        $tempDirectory = 'temp'.DIRECTORY_SEPARATOR.Auth::id();

        $data = $request->all();

        //dd($data);
        if( !in_array( $data ['region'], Region::all()->pluck('region_id')->toArray() )) unset($data['region']);
        if( !in_array( $data ['currency'], Currency::all()->pluck('id')->toArray() )) unset($data['currency']);
        if( !PostType::all()->contains('id', '=', $data['type'])) unset($data['type']);

        $validator = Validator::make($data, self::postRules);

        if ($validator->fails()){

            alert()->error('Не удалось создать обявление', 'Поля заполнены неверно');
            Storage::delete(Storage::files($tempDirectory));
            return redirect()->back()->withErrors($validator)->withInput();

        }else{

            $post = new Post();
            $post->description = $data['description'];
            $post->price = $data['price'];
            $post->currency_id = $data['currency'];
            $post->photo = 'single_family_colonial_1.png';
            $post->type_id = $data['type'];
            $post->user_id = Auth::id();
            $post->dwelling_type_id = $data['dwelling_type'];
            $post->save();

            $post->address()->create([
                'street' => $data['street'],
                'house' => $data['house'],
                'city_id' => $data['city'],

            ]);

            if (!is_null($data['phone_new'])){
                if(!Auth::user()->phone->contains('phone',$data['phone_new'])){
                    $phone = Auth::user()->phone()->create([ 'phone' => $data['phone_new']]);
                    $data['phone'] []= $phone->id;
                }
            }


            foreach ($data['phone'] as $phone){
                $post->user_phone()->attach($phone);
            }

            $details = [
                'square'    => $data['square'  ],
                'rooms'     => $data['rooms'   ],
                'balcony'   => $data['balcony' ],
                'parking'   => $data['parking' ],
                'internet'  => $data['internet'],
            ];

            if(isset($data['floor']) && isset($data['floor_max']) && $data['floor_max'] >= $data['floor']){
                $details ['floor'] = $data['floor'];
                $details ['floor_max'] = $data ['floor_max'];
            }

            $details = array_filter($details,function ($detail){
                return !is_null($detail);
            });

            if(!empty($details)){
                if(isset($details['square'])) $details['square'] = $detail = (float) str_replace(',' , '.', $details['square']);

                $post->details()->create($details);
            }


            foreach (Storage::files($tempDirectory) as $file){
                Storage::move($file,$post->id.DIRECTORY_SEPARATOR.Auth::id().basename($file));
            }

            Storage::deleteDirectory($tempDirectory);

            alert('Объявление добавленно', "Обявление {$post->title()} успешно добавленно");
            return redirect()->route('post', ['id' => $post->id ]);
        }
    }
}
