<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('Posts', ['Posts' => Post::Latest(), 'title' => 'Последние объявления']);
    }

    public function getPost($slug){
        return view('Post', ['Post' => Post::where('slug', $slug)->first()]);
    }

    public function rent(){
        return view('Rent', ['Posts' => Post::where('type_id', 1)->paginate(10)]);
    }

    public function buy(){

    }
}
