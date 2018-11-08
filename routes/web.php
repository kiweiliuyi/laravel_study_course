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
/**
*控制器路由
*/
Route::get('index', 'IndexController@index');
// Home模块下 三级模式
// Route::group(['namespace' => 'Home','prefix' => 'home'],function(){
// 	Route::group(['prefix' => 'index'],function (){
// 		Route::get('index','IndexController@index');
// 	});
// });

// Home模块下 三级模式 把id定义在路由中
Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
    Route::group(['prefix' => 'index'], function () {
        Route::get('index/{id}', 'IndexController@index');
    });
});

Route::prefix('database')->group(function () {
    Route::get('insert', 'DatabaseController@insert');
    Route::get('get','DatabaseController@get');
});



/**
*模型路由
*/
Route::prefix('model')->group(function (){
	Route::get('index','ModelController@index');
	Route::get('get','ModelController@get');
	Route::get('store','ModelController@store');
	Route::get('update','ModelController@update');
	Route::get('delete', 'ModelController@delete');
	Route::get('restore', 'ModelController@restore');
	Route::get('forceDelete', 'ModelController@forceDelete');
});

/**
*视图路由
*/
Route::prefix('view')->group( function (){
	Route::get('index','ViewController@index');
	Route::get('create','ViewController@create');
	Route::post('store', 'ViewController@store');
	Route::get('edit/{id}', 'ViewController@edit');
	Route::post('update/{id}', 'ViewController@update');
	Route::get('destroy/{id}', 'ViewController@destroy');
	Route::get('restore/{id}', 'ViewController@restore');
	Route::get('forceDelete/{id}', 'ViewController@forceDelete');
});
