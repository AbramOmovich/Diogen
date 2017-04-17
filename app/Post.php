<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function floor(){
        return $this->details->floor.'/'.$this->details->floor_max;
    }

    public function  title(){
        return ucfirst($this->address->street).', '.$this->address->house;
    }

    public function scopeLatest ($builder){
        return $builder->orderBy('created_at', 'desc')->paginate(16);
    }

    public function address(){
        return $this->hasOne(Address::class,'post_id');
    }

    public function type(){
        return $this->belongsTo(PostType::class,'type_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at','desc');
    }

    public function dwellingType(){
        return $this->belongsTo(DwellingType::class, 'dwelling_type_id','dwelling_id');
    }

    public function details(){
        return $this->hasOne(Detail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function user_phone(){
        return $this->belongsToMany(UserPhone::class,'post_user_phone');
    }
}

