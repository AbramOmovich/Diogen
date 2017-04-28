<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function make(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'comment' => 'required|min:5|max:250'
        ]);

        if($validator->fails()){
            alert()->error('Не удалось добавить коментнарий','');
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            Auth::user()->comment()->create([
                'text' => $request->comment,
                'post_id' => Post::where('id',$id)->first()->id
            ]);
            alert('Комментарий добавлен', 'Комментарий '.str_limit($request->comment,50).' успешно добавлен');
            return redirect()->back();
        }
    }

    public function delete(Request $request){
        if ($request->has('id')) $comment = Comment::where('id', $request->id)->first();
        if(Auth::id() == $comment->user->id || Auth::user()->role_id == 2 ) {

            alert()->warning('Коментарий удалён',"Коментарий  ".str_limit($comment->text,30)." успешно удалён");
            $comment->delete();
        }

        return redirect()->back();
    }
}
