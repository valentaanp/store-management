<?php

use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

// Barang Route
Route::get('/barang', $controller_path . '\barang\Barang@index')->name('barang');
Route::post('/barang/tambah-barang', $controller_path . '\barang\Barang@store')->name('barang.add');
Route::post('/barang/edit-barang/{id}', $controller_path . '\barang\Barang@update')->name('barang.edit');
Route::delete('/barang/hapus-barang/{id}', $controller_path . '\barang\Barang@destroy')->name('barang.destroy');


// People Routes
Route::get('/people', $controller_path . '\resources\Resources@index')->name('people');

// Hak Akses Routes
Route::get('/hak-akses', $controller_path . '\hak_akses\HakAkses@index')->name('hak-akses');

// Pengguna Routes
Route::get('/pengguna', $controller_path . '\pengguna\Pengguna@index')->name('pengguna');

// Supplier Routes
Route::get('/supplier', $controller_path . '\supplier\Supplier@index')->name('supplier');

// Penjualan Routes
Route::get('/penjualan', $controller_path . '\penjualan\Penjualan@index')->name('penjualan');

// Pembelian Routes
Route::get('/pembelian', $controller_path . '\pembelian\Pembelian@index')->name('pembelian');

// Pelanggan Routes
Route::get('/pelanggan', $controller_path . '\pelanggan\Pelanggan@index')->name('pelanggan');
