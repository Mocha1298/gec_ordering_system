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
    return view('beranda');
});
Route::get('/menu_makanan','Tampil@tampil_menu');
Route::get('/hapus/{id}','Transaksi@item_hapus');
Route::get('/add/{id}','Transaksi@edit_add');
Route::get('/min/{id}','Transaksi@edit_min');
Route::post('/baru','Transaksi@item_baru');
Route::get('/cek-old/{id}','Tampil@cek_old');
