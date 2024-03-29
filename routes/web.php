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

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/create', 'HomeController@create');
Route::post('/store', 'HomeController@store');
Route::get('/player/{id}', 'HomeController@player');
Route::get('/cipher', 'HomeController@cipher');

