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

Route::group(['middleware' => ['auth', 'checkRole:user']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/event/{id}/detail', 'HomeController@detail');
    Route::post('/checkout/{id}/event', 'TransaksiController@index');
    Route::get('/event/{id}/bayar', 'TransaksiController@beli');
    Route::patch('/event/{id}/bayar', 'TransaksiController@bayar');
    Route::get('/about', 'HomeController@about');
    Route::get('/myprofile/{id}', 'AuthController@show');
    Route::get('/editprofile', 'AuthController@edit');
    Route::get('/myticket', 'AuthController@myticket');
    Route::get('/dashboardEO', 'DashboardEOController@index')->name('dashboard-event');
    Route::get('/data-pembayaran', 'DashboardEOController@pembayaran');
    Route::get('/data-pembeli', 'DashboardEOController@pembeli');
    Route::post('/postEO', 'PemilikController@store');
    Route::get('/show-event', 'EventController@index')->name('show-event');
    Route::post('/show-event', 'EventController@store');
    Route::get('/show-event/{id}/edit', 'EventController@edit');
    Route::put('/edit-event/{id}', 'EventController@update');
    Route::delete('/show-event/{id}/hapus', 'EventController@destroy');
    Route::get('/show-event/{id}/detail', 'TiketController@show');
    Route::post('/show-event/{id}/detail', 'TiketController@store');
    Route::get('/ubah/{id}/tiket', 'TiketController@edit');
    Route::put('/edit-tiket/{id}', 'TiketController@update');
    Route::delete('/hapus/{id}/tiket', 'TiketController@destroy');


    
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/admineventterbaru', 'AdminController@eventterbaru');
    Route::put('/konfirmasi/{id}', 'AdminController@updatekonfirmasi');
    Route::put('/tolak/{id}', 'AdminController@updatetolak');
    Route::get('/admineventterkonfirmasi', 'AdminController@eventterkonfirmasi');
    Route::get('/admineventditolak', 'AdminController@eventditolak');
    Route::get('/detail/{id}/event', 'AdminController@show');
    Route::get('/kategorievent', 'KategoriEventController@index');
    Route::post('/tambahkategorievent', 'KategoriEventController@store');
    Route::get('/kategorievent/{id}/ubah', 'KategoriEventController@edit');
    Route::put('/kategorievent/{id}', 'KategoriEventController@update');
    Route::delete('hapuskategorievent/{id}', 'KategoriEventController@destroy');
    Route::get('/kategoritiket', 'KategoriTiketController@index');
    Route::post('/tambahkategoritiket', 'KategoriTiketController@store');
    Route::get('/kategoritiket/{id}/ubah', 'KategoriTiketController@edit');
    Route::put('/kategoritiket/{id}', 'KategoriTiketController@update');
    Route::delete('hapuskategoritiket/{id}', 'KategoriTiketController@destroy');

});

Route::get('/', 'AuthController@index');
Route::get('/eventfestival/{id}/', 'AuthController@detailFestival');
Route::get('/eventmusik/{id}/', 'AuthController@detailMusik');
Route::get('/eventseni/{id}/', 'AuthController@detailSeni');
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/postlogin', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/postregister', 'AuthController@register');