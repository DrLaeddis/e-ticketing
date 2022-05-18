<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [TiketController::class, 'index']); //home
Route::post('/', [TiketController::class, 'index']); //home post

Route::post('/pesan', [TiketController::class, 'pesan']);

Route::post('/tiket', [TiketController::class, 'tiket']); //cek tiket

Route::get('/data', [TiketController::class, 'data']); //cek data diri

Route::get('/admin', [AdminController::class, 'home'] ); //admin main menu

Route::get('/admintransaksi', [AdminController::class, 'transaksi'] ); //admin trasaksi

Route::get('/adminbus', [AdminController::class, 'bus'] ); //admin bus

Route::get('/adminvalidasi', [AdminController::class, 'validasi'] ); //admin validasi

Route::get('/delete/{id}', [AdminController::class, 'delete']); //untuk delete

Route::post('/insertBus', [AdminController::class, 'insertBus']);

Route::post('/insertdata', [TiketController::class, 'insertdata']);

Route::post('/insertpenumpang', [TiketController::class, 'insertpenumpang']);

Route::get('/checkout', [TiketController::class, 'checkout']);

Route::get('/forward/{id_pemesanan}', [TiketController::class, 'forward']);

Route::get('/cancel/{id_pemesanan}', [TiketController::class, 'cancel']);

Route::get('/sendTiket/{id_pemesanan}', [TiketController::class, 'sendTiket']);

Route::get('/flush', function(){
    session()->flush();
    return redirect('/');
});

Route::get('/validasi', [TiketController::class, 'validasi']);//user validasi

Route::post('/buktipembayaran', [TiketController::class, 'bayar']);//user bayar

Route::get('/valid/{id}', [AdminController::class, 'valid']);

Route::get('/invalid/{id}', [AdminController::class, 'invalid']);

Route::get('/adminDatadiri', [AdminController::class, 'admindatadiri']);//admin Data diri