<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',['uses'=>'PhotoController@index']);
});

Route::post('/insert',['uses'=>'PhotoController@insert']);

Route::get('favarite',['uses'=>'PhotoController@favarite']);

Route::post('/insertDes',['uses'=>'PhotoController@insertDes']);

Route::post('/delete',['uses'=>'PhotoController@delete']);
