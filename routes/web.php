<?php

use App\Http\Controllers\AplikasiBarangMasukController;
use App\Http\Controllers\AplikasiPenjualanController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplyerController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\TelegramBotController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Auth::routes([
    'register' => false
]);



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    
    Route::get('barang/{id}/tambah',[BarangController::class,'tambahStok'])->name('barang.tambahStok');
    Route::get('barang/{id}/kurangi',[BarangController::class,'kurangiStok'])->name('barang.kurangiStok');
    Route::get('telegra-notification',[DashboardController::class,'telegram'])->name('telegram');
    Route::get('penghasilan/{rentang?}',[DashboardController::class,'penghasilan'])->name('penghasilan');
    Route::get('getDetails/{id}',[AplikasiPenjualanController::class,'getDetail'])->name('getDetails');
    Route::get('getDiscount/{id}',[AplikasiPenjualanController::class,'getDiscount'])->name('getDiscount');
    Route::get('getDatalist/{kode}',[AplikasiPenjualanController::class,'datalist'])->name('datalist');
    Route::resource('aplikasi-penjualan',AplikasiPenjualanController::class);
    Route::resource('aplikasi-barang-masuk',AplikasiBarangMasukController::class);
    Route::resource('supplyer',SupplyerController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('kategori-barang', KategoriController::class);
    Route::resource('laporan', LaporanController::class);
    // Route::resource('riwayat')
});
