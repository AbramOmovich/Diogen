<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{


    protected $fillable = [
        'message', 'from', 'name', 'phone', 'email', 'to_user', 'post_id', 'watched'
    ];

    public function senderName(){
        if(!is_null($this->from)){
            return $this->belongsTo(User::class,'from')->first()->firstName;
        }
        else return $this->name;
    }

    public function senderPhone(){
        if(!is_null($this->phone)) return $this->phone;
        else return $this->belongsTo(User::class,'from')->first()->phone()->first()->phone;
    }

    public function senderEmail(){
        if(!is_null($this->email)) return $this->email;
        else if(!is_null($this->from)) return $this->belongsTo(User::class,'from')->first()->email;
        else return false;
    }

    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }

    public function hasUser(){
        if(!is_null($this->from)) return true;
        else return false;
    }

    public function senderUser(){
        if ($this->hasUser()) return $this->belongsTo(User::class, 'from');
        else return false;
    }
}
