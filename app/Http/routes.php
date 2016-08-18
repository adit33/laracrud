<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
Route::get('product','ProductController@index');
Route::post('api/product','ProductController@store');
Route::get('api','ProductController@apiIndex');
Route::DELETE('product/delete/{id}','ProductController@destroy');
});
