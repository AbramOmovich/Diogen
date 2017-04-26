<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showMessages(){

        $messages = Auth::user()->messages;

        foreach ($messages as $message){
            if($message->watched === 0) {
                $message->watched = 1;
                $message->save();
            }
            else break;
        }

        return view('messages',['messages' => $messages]);
    }
}
