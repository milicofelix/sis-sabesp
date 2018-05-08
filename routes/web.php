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

Route::group(['prefix' => 'sabesp','as' => 'sabesp.'],function () {

    Route::get('/', ['as' => 'index', 'uses' => 'SabespController@index']);
    Route::get('add', ['as' => 'sabesp-form', 'uses' => 'SabespController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'SabespController@store']);
    Route::get('edit/{id}',['as'=>'editar','uses'=>'SabespController@edit']);
    Route::post('update/{id}',['as'=>'atualiza','uses'=>'SabespController@update']);
    Route::get('destroy/{id}',['as'=>'remove','uses'=>'SabespController@destroy']);
});