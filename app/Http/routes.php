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

Route::get('/', 'SiteController@home');

Route::get('/index', 'SiteController@home');

Route::get('/parkir', 'ParkirController@index');

Route::get('/terminal', 'TerminalviewController@cek');

Route::get('/parkir/cari', 'ParkirController@show');

Route::get('/tentang', 'SiteController@tentang');

Route::get('user/pembayaran', 'UserController@pembayaran');

Route::post('user/status', 'Pembayaran@add');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/notifikasi', 'NotifikasiviewController@test');

Route::get('parkir/daftar', 'ParkirController@create');

Route::get('terminal/lahan', 'TerminalviewController@lahan');

Route::post('parkir/save', 'ParkirController@store');

Route::get('/user/lahan','TerminalviewController@lahan_saya');

Route::post('/user/save_lahan', 'TerminalviewController@store_lahan_saya');

Route::get('parkir/{id}/edit', 'ParkirController@edit');

Route::post('parkir/{id}/update', 'ParkirController@update');