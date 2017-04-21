<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'post_id';

    protected $fillable = ['street','house','city_id'];

    public function city(){
        return $this->belongsTo(City::class,'city_id','city_id');
    }
}
