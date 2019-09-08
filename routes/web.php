<?php

use Illuminate\Support\Facades\Cache;

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
    return view('login');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

Route::get('/home_user', 'User@index');
Route::get('/login', 'User@login');
Route::post('/loginPost', 'User@loginPost');
Route::get('/register', 'User@register');
Route::post('/registerPost', 'User@registerPost');
Route::get('/logout', 'User@logout');

Route::get('/alat', 'Alat@index');
Route::post('/alatCreate', 'Alat@alatCreate');
Route::resource('/alat','Alat');

Route::get('/pinjam_koin', 'PinjamKoin@index');
Route::post('/pinjam_koinCreate', 'PinjamKoin@pinjam_koinCreate');
Route::resource('/pinjam_koin','PinjamKoin');

Route::get('/pinjam_ktm', 'PinjamKTM@index');
Route::post('/pinjam_ktmCreate', 'PinjamKTM@pinjam_ktmCreate');
Route::resource('/pinjam_ktm','PinjamKTM');

Route::get('/peminjam', 'Peminjam@index');
Route::post('/peminjamCreate', 'Peminjam@peminjamCreate');
Route::resource('/peminjam','Peminjam');

Route::get('/laporan_pinjam_koin', 'LaporanKoin@index');
Route::resource('/laporan_pinjam_koin','LaporanKoin');

Route::get('/laporan_pinjam_ktm', 'LaporanKTM@index');
Route::resource('/laporan_pinjam_ktm','LaporanKTM');

Route::get('/laporan_inventaris', 'LaporanInventaris@index');
Route::post('/inventarisCreate', 'LaporanInventaris@inventarisCreate');
Route::resource('/laporan_inventaris','LaporanInventaris');
Route::get('ajaxRequest', 'LaporanInventaris@ajaxRequest');
Route::post('ajaxRequest', 'LaporanInventaris@ajaxRequestPost');

/*Route::get('/peminjam', 'Peminjam@index');
Route::get('/peminjam', function () {
    return view('peminjam');
});*/