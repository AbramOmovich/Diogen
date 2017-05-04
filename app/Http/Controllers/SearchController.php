<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function result(Request $request){
        if($request->has('query')) {
            $query = $request->input('query');

            $words = explode(' ',$query);
            $words = array_filter($words,function ($word){
               return $word != "";
            });

            $Posts = Post::join('addresses','posts.id', '=', 'addresses.post_id')
                ->join('cities','addresses.city_id','=', 'cities.city_id');

            foreach ($words as $word){
                $Posts->orWhere('street' ,'like' , "%{$word}%");
            }

            $paginate = $request->input('paginate',10);
            $sort = $request->input('sort','created_at');
            $ord = $request->input('ord','desc');


            return view('Stock', [
                'Posts' => $Posts->orderBy($sort,$ord)->paginate($paginate),
                'pageTitle' => "Результаты поиска по запросу \"{$query}\"",
                'pagination_vars' => PostController::pagination_vars,
                'sort_vars' => PostController::sort_vars,
                'sort' => $sort,
                'ord' => $ord,
                'paginate' => $paginate,
            ]);
        }
    }
}
