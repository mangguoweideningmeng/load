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
    return view('welcome');
});

Route::get('/user/create','LoginController@create')->middleware('login');//登录
Route::prefix('user')->group(function(){
    Route::get('/reg','LoginController@reg');//注册
    Route::post('/regdo','LoginController@regdo');//注册
    Route::get('/login','LoginController@login');//登录
    Route::post('/logindo','LoginController@logindo');//登录
});

Route::get('/test','TestController@test');//注册
