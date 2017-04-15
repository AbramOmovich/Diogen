<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
        return $this->belongsTo(DwellingType::class);
    }

    public function details(){
        return $this->hasOne(Detail::class);
    }
}

