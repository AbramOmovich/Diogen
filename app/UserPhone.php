<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{

    protected $fillable = [
        'phone'
    ];

    public $timestamps = false;
}
