<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showMessages(){

        $messages = Auth::user()->messages;

        return view('messages',['messages' => $messages]);
    }

    public function changeUserState(Request $request){
        if($request->has('state') && $request->has('id') && Auth::user()->role_id == 2) {
            $user = User::where('id',$request->input('id'))->first();
            $user->state = $request->input('state');

            alert('Пользователь заблокирован', "Пользователь {$user->firstName} {$user->lastName} успешно заблокирован");
        }
        return redirect()->back();
    }
}
