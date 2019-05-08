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

Auth::routes();

Route::get('/home', function () {
    return view('pages.dashboard');
});


Route::view('/input', 'home');
Route::get('/input','kontorutamu@show');
Route::post('/input/simpan','kontorutamu@save');
Route::get('/hapus/{id}','kontorutamu@hapus');

Route::get('/filter_tanggal', 'FilterController@tanggal');
Route::get('/filter_tanggal/result', 'FilterController@result_tanggal');
Route::get('/hapus_tanggal/{id}','FilterController@hapus');
Route::get('/edit_tanggal/{id}','FilterController@edit');
Route::patch('/update_tanggal/{id}','FilterController@update');



