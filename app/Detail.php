<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'square', 'rooms', 'floor', 'balcony', 'parking', 'internet'
    ];

    protected $hidden = ['post_id'];
}
