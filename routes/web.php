<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\TelegramBotController;

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
Route::get('/cek',[TelegramBotController::class,'alertForStock']);
Route::get('/', function(){
    return redirect()->route('admin.home');
});
Auth::routes();



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('barang/{id}/tambah',[BarangController::class,'tambahStok'])->name('barang.tambahStok');
    Route::get('barang/{id}/kurangi',[BarangController::class,'kurangiStok'])->name('barang.kurangiStok');
    Route::resource('barang', BarangController::class);
    Route::resource('kategori-barang', KategoriController::class);
    Route::resource('laporan', LaporanController::class);
    // Route::resource('riwayat')
});
