<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('Home');
Route::get('rent','PostController@rent')->name('Rent');
Route::get('buy','PostController@buy')->name('Buy');

Route::group(['prefix' => 'adv'] , function($route){
    $route->get('{slug}', 'PostController@getPost')->name('post');
});
