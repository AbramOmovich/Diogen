<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index')->name('Home');
Route::get('rent/{paginate?}/{sort?}/{ord?}','PostController@rent')->name('Rent');
Route::get('buy/{paginate?}/{sort?}/{ord?}','PostController@buy')->name('Buy');

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
    $route->get('{slug}', 'PostController@getPost')->name('post');
});
