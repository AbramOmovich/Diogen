<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected const pagination_vars = [10, 25, 50, 100];

    protected const sort_vars = [
        'Сначала новые' => [
            'field' => 'created_at',
            'ord' => 'asc'
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
        return view('Post', ['Post' => Post::where('slug', $slug)->first()]);
    }

    public function rent($paginate = 10, $sort = 'created_at', $ord ='asc'){

        if(!in_array($paginate, self::pagination_vars)) $paginate = self::pagination_vars[0];

        if(!self::rigth_field($sort)) $sort = self::sort_vars[0]['field'];

        $Posts = Post::where('type_id', 1);

        return view('Rent', [
            'Posts' => $Posts->orderBy($sort, $ord)->paginate($paginate),
            'paginate' => $paginate,
            'sort' => $sort,
            'ord' => $ord,
            'pagination_vars' => self::pagination_vars,
            'sort_vars' => self::sort_vars
        ]);
    }

    public function buy(){

    }
}
