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

Route::get('/', 'PublicContoller@index');
Route::get('/public/{kondisi}', 'PublicContoller@singlepath');
Route::get('/singlepath/{kon}/{slug}', 'PublicContoller@singlepath1');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{link}', 'HomeController@dinam');
Route::get('/home/lihat/galery/{slug}', 'HomeController@detail');
Route::delete('/home/lihat/galery/{id}', 'HomeController@dldetail');
Route::get('/home/edit/user/root', 'HomeController@getuser');
Route::put('/home/edit/user/root/{id}', 'HomeController@upuser');
Route::put('/home/{link}/{id}', 'HomeController@updinam');
Route::delete('/home/delete/{link}/{id}', 'HomeController@dldinam');
Route::post('/home/{link}', 'HomeController@svdinam');
