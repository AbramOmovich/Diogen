<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('Home');
Route::get('rent/','PostController@rent')->name('Rent');
Route::get('buy/','PostController@buy')->name('Buy');
Route::get('user/','PostController@getUserPosts')->middleware('auth')->name('userPosts');
Route::post('user/','PostController@alterUserPosts')->middleware('auth');

Route::get('/test','CityController@test');

Route::post('/get_cities','CityController@getCities');


Route::match(['get','head'],'login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::match(['get','head'],'password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.email');
Route::match(['get','head'],'password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');

Route::group(['prefix' => 'adv'] , function($route){
    $route->get('add', 'PostController@makePost')->name('make')->middleware('auth');
    $route->put('add', 'PostController@putPost')->middleware('auth');
    $route->group(['prefix' => '{id}'] , function ($slugRoute){
        $slugRoute->get('/', 'PostController@getPost')->name('post');
        $slugRoute->post('/addComment','CommentController@make')->name('addComment')->middleware('auth');
    });
});
