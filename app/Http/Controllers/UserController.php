<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showMessages(){

        if(Auth::user()->state != 2){
            $messages = Auth::user()->messages;

            return view('messages',['messages' => $messages]);
        }else{
            return redirect()->back();
        }
    }

    public function changeUserState(Request $request){
        if($request->has('state') && $request->has('id') && Auth::user()->role_id == 2) {
            $user = User::whereId($request->id)->first();
            $user->state = $request->state;
            $user->save();

            switch ($request->state){
                case '0':{ $action = 'разблокирован'; break;}
                case '1':{ $action = 'заблокирован'; break;}
                case '2':{ $action = 'удалён'; break;}
            }

            alert('Пользователь '.$action, "Пользователь {$user->firstName} {$user->lastName} успешно {$action}");
        }
        return redirect()->back();
    }
}
