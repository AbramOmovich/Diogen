<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Post;
use App\PostTypes;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected static $types = [
        'rent'  => 1,
        'buy'   => 2,
        'build' => 3
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
        return view('Posts', ['Posts' => Post::Latest(), 'title' => 'Последние объявления']);
    }

    public function getPost($slug){
        $post = Post::where('slug', $slug)->first();
        if($post) return view('Post', ['Post' => $post]);
        else return redirect()->route('Home');
    }

    public function rent($paginate = 10, $sort = 'created_at', $ord ='desc'){
       return $this->stock(__FUNCTION__,$paginate,$sort,$ord);
    }

    public function buy($paginate = 10, $sort = 'created_at', $ord ='desc'){
       return $this->stock(__FUNCTION__,$paginate,$sort,$ord);
    }

    protected function stock($method, $paginate, $sort, $ord){

        if(!in_array($paginate, self::pagination_vars)) $paginate = self::pagination_vars[0];

        if(!self::rigth_field($sort)) $sort = 'created_at';

        $Posts = Post::where('type_id', self::$types[$method]);

        return view('Stock', [
            'Posts' => $Posts->orderBy($sort, $ord)->paginate($paginate),
            'paginate' => $paginate,
            'sort' => $sort,
            'ord' => $ord,
            'pagination_vars' => self::pagination_vars,
            'sort_vars' => self::sort_vars
        ]);
    }

    public function makePost(){
        return view('Add');
    }

    public function putPost(Request $request){

        $data = $request->all();
        $data ['slug'] = str_slug( $data['title']);

        if( !in_array( $data ['region'], Region::all()->pluck('id')->toArray() )) unset($data['region']);
        if( !in_array( $data ['currency'], Currency::all()->pluck('id')->toArray() )) unset($data['currency']);
        if( !PostTypes::all()->contains('id', '=', $data['type'])) unset($data['type']);

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'slug' => 'unique:posts',
            'short_description' => 'required|min:10',
            'description' => 'required|min:10',
            'type' => 'required',
            'street' => 'required',
            'house' => 'required',
            'city' => 'required',
            'region' => 'required',
            'price' => 'required|min:0',
            'currency' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $post = new Post();
            $post->title = $data['title'];
            $post->slug = $data['slug'];
            $post->short_description = $data['short_description'];
            $post->description = $data['description'];
            $post->price = $data['price'];
            $post->currency_id = $data['currency'];
            $post->photo = 'single_family_colonial_1.png';
            $post->type_id = $data['type'];
            $post->user_id = Auth::id();
            $post->save();

            $post->address()->create([
                'street' => $data['street'],
                'house' => $data['house'],
                'city' => $data['city'],
                'region_id' => $data['region']
            ]);


            alert('Объявление добавленно', "Обявление {$post->title} успешно добавленно");
            return redirect()->route('post', ['slug' => $post->slug ]);
        }


    }

}
