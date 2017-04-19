<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    public function city(){
        return $this->hasMany(City::class,'region_id','region_id');
    }
}
