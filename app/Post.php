<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function scopeLatest ($builder){
        return $builder->orderBy('created_at', 'desc')->paginate(16);
    }
}
