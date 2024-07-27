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


// Store Routes
Route::get('/people', $controller_path . '\resources\Resources@index')->name('people');
