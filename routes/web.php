<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('Home');
Route::get('rent/','PostController@rent')->name('Rent');
Route::get('buy/','PostController@buy')->name('Buy');

Route::group(['prefix' => 'user'], function($userRoute){
    $userRoute->get('/','PostController@getUserPosts')->middleware('auth')->name('userPosts');
    $userRoute->get('edit/{id}','PostController@editPost')->middleware('auth')->name('editPost');
    $userRoute->put('edit/{id}','PostController@syncPost')->middleware('auth')->name('syncPost');
    $userRoute->post('delete', 'PostController@deletePost')->middleware('auth')->name('deletePost');
});

Route::get('search-result/','SearchController@result')->name('search');

Route::get('/test','CityController@test');
Route::post('/get_cities','CityController@getCities');

Route::post('message','MessageController@sendMessage')->name('message');

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
    $route->post('upload', 'ImageController@upload')->name('upload-image')->middleware('auth');
    $route->post('delete-image', 'ImageController@delete')->name('delete-image')->middleware('auth');
    $route->group(['prefix' => '{id}'] , function ($slugRoute){
        $slugRoute->get('/', 'PostController@getPost')->name('post');
        $slugRoute->post('/addComment','CommentController@make')->name('addComment')->middleware('auth');
    });
});
