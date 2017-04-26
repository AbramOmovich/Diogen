<?php

namespace App;

use App\UserPhone;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstName', 'lastName', 'email', 'password','role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comment(){
        return $this->hasMany(Comment::class);
    }


    public function phone(){
        return $this->hasMany(UserPhone::class)->orderBy('id','desc');
    }

    public function role(){
        return $this->belongsTo(UserRole::class);
    }

    public function messages(){
        return $this->hasMany(Message::class,'to_user')->latest();
    }

    public function newMessages(){
        return $this->messages()->where('watched',0)->get()->count();
    }
}
