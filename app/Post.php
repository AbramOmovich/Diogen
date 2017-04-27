<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    public function floor(){
        return $this->details->floor.'/'.$this->details->floor_max;
    }

    public function  title(){
        return ucfirst($this->address->street).', '.$this->address->house;
    }

    public function scopeLatests ($builder){
        return $builder->orderBy('created_at', 'desc')->limit(16)->get();
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

    public function hasPhotos(){
        if(Storage::exists($this->id) && Storage::files($this->id)) return true;
        else return false;
    }

    public function getPhotos(){
        $file_urls = [];
        foreach (Storage::files($this->id) as $file){
            $file_urls []= Storage::url($file);
        }
        return $file_urls;
    }

    public function showPhoto(){
        if($this->hasPhotos()) return $this->getPhotos()[0];
        else return '/public/images/nophoto.png';
    }

    public static function getRandomPosts($amount = 3){
        $ids = Post::all()->pluck('id')->toArray();

        $rand_ids = array_rand(array_flip($ids),$amount);

        return Post::whereIn('id', $rand_ids)->get();
    }

    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public function price(){
        return separate($this->price).' $';
    }
}

