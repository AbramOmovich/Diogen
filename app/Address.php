<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    protected $fillable = ['street','house','city','region_id'];

    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }
}
