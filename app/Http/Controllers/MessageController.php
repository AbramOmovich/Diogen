<?php

namespace App\Http\Controllers;

use App\Message;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    protected const rules = [
        'name' => 'required|min:2|max:50',
        'code' => 'required',
        'email'=> 'max:100',
        'comment' => 'max:200',
        'id' => 'required'
    ];

    public function sendMessage(Request $request){
       try{

           if(!Auth::check()) {
               $this->validate($request,self::rules);
           }
           else{
               $this->validate($request,['comment' => 'max:200']);
           }

           $data = $request->all();
           $message = new Message();

           if($data['comment']) $message->comment = $data['comment'];
           $message->from = Auth::id();

           if(!Auth::check()){
               $message->name = $data['name'];
               $message->phone = '+375'. $data['code'] . $data['phone'];
               if ($data['email']) $message->email = $data['email'];
           }

           $message->post_id = $data['id'];
           $message->to_user = Post::where('id',$data['id'])->first()->user_id;
           $message->save();

       }catch (ValidationException $vEx){
           abort(404);
       }
    }
}
