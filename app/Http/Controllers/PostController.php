<?php

namespace App\Http\Controllers;

use App\Address;
use App\Currency;
use App\Post;
use App\PostType;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
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

    protected const pagination_vars = [10, 25, 50];

    protected const sort_vars = [
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

    public function index(){
        return view('Posts', ['Posts' => Post::Latests(), 'title' => 'Последние объявления']);
    }

    public function getPost($id){
        $post = Post::where('id',$id)->first();
        if($post) return view('Post', ['Post' => $post, 'details_types' => self::details_types]);
        else return redirect()->route('Home');
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
                        if (in_array(5,$values)) $posts->where('rooms', '>=', 4);
                        $posts->whereIn($field, $values);
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
        return view('Add');
    }

    public function putPost(Request $request){

        $data = $request->all();

        //dd($data);
        if( !in_array( $data ['region'], Region::all()->pluck('region_id')->toArray() )) unset($data['region']);
        if( !in_array( $data ['currency'], Currency::all()->pluck('id')->toArray() )) unset($data['currency']);
        if( !PostType::all()->contains('id', '=', $data['type'])) unset($data['type']);

        $validator = Validator::make($data, [
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

            'square'        => 'min:0',
            'rooms'         => 'min:0',
            'floor'         => 'min:0',
            'balcony'       => 'min:0|max:1',
            'parking'       => 'min:0|max:1',
            'internet'      => 'min:0|max:1',
        ]);

        if ($validator->fails()){

            alert()->error('Не удалось создать обявление', 'Поля заполнены неверно');
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
                if(isset($details['square'])) $details['square'] = $detail = (float) $details['square'];

                $post->details()->create($details);
            }

            alert('Объявление добавленно', "Обявление {$post->title()} успешно добавленно");
            return redirect()->route('post', ['id' => $post->id ]);
        }
    }
}
