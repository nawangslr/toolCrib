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


/*Route::get('/peminjam', 'Peminjam@index');*/
Route::get('/peminjam', function () {
    return view('peminjam');
});