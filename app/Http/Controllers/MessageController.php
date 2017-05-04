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

    public function deleteMessage($id){
        $message = Message::whereId($id)->first();

        if($message && $message->to_user === Auth::id()){
            alert()->warning('Сообщение удалено', 'Cообщение '.$message->comment.' успешно удалено' );
            $message->delete();

        }

        return redirect()->back();
    }

    public function reply(Request $request){

        if($request->has('id')){
             $message = Message::whereId($request->id)->first();
             if(!$message) abort(404);

            try{

               $this->validate($request,['reply' => 'required|max:250']);

                $data = $request->all();
                $reply = new Message();

                $reply->comment = $data['reply'];
                $reply->from = Auth::id();

                $reply->post_id = $message->post_id;
                $reply->to_user = $message->senderUser->id;
                $reply->save();

            }catch (ValidationException $vEx){
                abort(404);
            }
        }
    }
}
