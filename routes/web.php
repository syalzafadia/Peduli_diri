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



/*login & register*/
Route::get('/register','AuthController@getRegister')->name('register')->middleware('guest');
Route::post('/register','AuthController@postRegister')->middleware('guest');
Route::get('/login','AuthController@getLogin')->middleware('guest')->name('login');
Route::post('/login','AuthController@postLogin')->middleware('guest');;
Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('logout');

/*Akses yang dibuka oleh user dan admin*/
Route::group(['middleware' => ['auth', 'cekrole:admin,user']],function(){

   

/*user*/
Route::get('/home','UserprofileController@home')->name('home');
Route::get('/user','UserprofileController@index')->name('user.index');
Route::post('/user','UserprofileController@update')->name('user.update');
Route::post('/changepassword','UserprofileController@changepassword')->name('changepassword');

}); 

/*akses yang bisa di buka oleh admin*/
Route::group(['middleware' => ['auth', 'cekrole:admin,user']],function(){

/*code*/

Route::get('/perjalanan', 'PerjalananController@index')->middleware('auth');
Route::get('/perjalanan/tambah', 'PerjalananController@create')->middleware('auth');
Route::post('/perjalanan/store', 'PerjalananController@store')->middleware('auth');
Route::get('/perjalanan/delete/{id_perjalanan}', 'PerjalananController@destroy')->middleware('auth');

}); 



/*Kota*/

Route::get('/kota', 'KotaController@index')->middleware('auth');
Route::get('/kota/tambah', 'KotaController@create')->middleware('auth');
Route::post('kota/store', 'KotaController@store')->middleware('auth');
Route::get('/kota/delete/{id_kota}', 'KotaController@destroy')->middleware('auth');

/*Perjalanan*/

Route::get('/perjalanan', 'PerjalananController@index')->middleware('auth');
Route::get('/perjalanan/tambah', 'PerjalananController@create')->middleware('auth');
Route::post('/perjalanan/store', 'PerjalananController@store')->middleware('auth');
Route::get('/perjalanan/delete/{id_perjalanan}', 'PerjalananController@destroy')->middleware('auth');

/* akses yang bisa di buka oleh user */

Route::get('/dropdown', 'DropdownController@index');
Route::get('/getkota', 'DropdownController@getKota');
Route::get('/getkecamatan', 'DropdownController@getKecamatan');
Route::get('/getkelurahan', 'DropdownController@getKelurahan');