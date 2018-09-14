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

Route::get('/', 'UserController@index');

Route::get('about', function () {
    return view('about');
});
Route::get('index', function () {
    return view('index');
});
Route::get('tours', function () {
    return view('tours');
});
Route::get('contacts', function () {
    return view('contacts');
});
Route::get('gallery', function () {
    return view('gallery');
});
Route::get('blog', function () {
    return view('blog');
});
Route::get('reservation',function(){
    return view('reservation');
});
Route::get('reservation', 'UserController@oda_bilgisi_1');

Route::post('reservation','UserController@kontrol');




Route::get('admin', 'UserController@admin');



Route::get('login', function () {
    return view('admin.pages.examples.login');
});
Route::post('login', 'UserController@giris');




Route::get('register', function () {
    return view('admin.pages.examples.register');
});
Route::post('register', 'UserController@uye_ol');



Route::get('forgot', function () {
    return view('admin.pages.examples.forgot');
});
Route::post('forgot', 'UserController@sifre');




Route::get('data', 'UserController@uye_bilgisi');

Route::get('uye_sil/{id}','UserController@uye_sil');

Route::get('rezervasyon_sil/{id}','UserController@rezervasyon_sil');

Route::get('rezervasyon/{no}','UserController@rezervasyon');
Route::post('randevu_al','UserController@randevu_al');

Route::get('simple', 'UserController@giris_bilgisi');

Route::get('room', 'UserController@oda_bilgisi');

Route::post('room', 'UserController@oda_ekle');

Route::get('oda_sil/{id}','UserController@oda_sil');


Route::get('booking','UserController@rezervasyon_bilgisi');

Route::get('cikis','UserController@cikis');

