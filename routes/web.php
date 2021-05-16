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
    return view('/auth/login');
});
Route::middleware('auth')->group(function(){
    Route::get('/home', function () {
        return view('dashboard');
    });
    Route::get('/analytic', function () {
        return view('analytic');
    });
    // tabel peminjaman
    Route::get('/peminjaman', 'PeminjamanController@index');
    Route::get('/exportpeminjaman', 'PeminjamanController@peminjamanexport');
    Route::post('/importpeminjaman', 'PeminjamanController@peminjamanimport');
    Route::delete('/peminjaman/{id_peminjaman}', 'PeminjamanController@destroy');
    Route::get('/peminjaman/detail/{id_peminjaman}', 'PeminjamanController@show');
    Route::get('/peminjaman/update/{id_peminjaman}', 'PeminjamanController@edit');
    Route::put('/peminjaman/update/{id_peminjaman}', 'PeminjamanController@update');
    Route::get('/peminjaman/create', 'PeminjamanController@create');
    Route::post('/peminjaman', 'PeminjamanController@store');

    //tabel anggota
    Route::get('/anggota', 'AnggotaController@index');
    Route::get('/exportanggota', 'AnggotaController@anggotaexport');
    Route::post('/importanggota', 'AnggotaController@anggotaimport');
    Route::delete('/anggota/{id_anggota}', 'AnggotaController@destroy');
    Route::get('/anggota/detail/{id_anggota}', 'AnggotaController@show');
    Route::get('/anggota/update/{id_anggota}', 'AnggotaController@edit');
    Route::put('/anggota/update/{id_anggota}', 'AnggotaController@update');
    Route::get('/anggota/create', 'AnggotaController@create');
    Route::post('/anggota', 'AnggotaController@store');
});


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
