<?php

use App\Models\Transaksi_barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProdJokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\ProdPackingController;
use App\Http\Controllers\ProdMentahanController;
use App\Http\Controllers\ProdFinishingController;
use App\Http\Controllers\VendorProduksiController;
use App\Http\Controllers\ProdKirimBarangController;
use App\Http\Controllers\TransaksiBarangController;

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

// ini dari branch fitur jajal hahahaha

Route::get('/', function () {
    return view('dashboard.layout.main', [
        'tittlePage' => 'Menu Utama',
    ]);
})->middleware('auth');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// REGISTRASI
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);

// Admin //sales
Route::resource('/sales', UserController::class)->middleware('admin');
Route::post('/sales/{user}', [UserController::class, 'destroy_sales'])->middleware('admin');
Route::get('/sales_show/{user}', [UserController::class, 'show_sales'])->middleware('admin');

// Permohonan User
Route::get('/permohonanuser', [UserController::class, 'permohonan'])->middleware('admin');
Route::get('/permohonanuser/{id}', [UserController::class, 'updatepermohonan'])->middleware('admin');
Route::POST('/permohonanuser/{id}', [UserController::class, 'prosesupdatepermohonan'])->middleware('admin');
// Route::put('/sales_update/{sales}', [UserController::class, 'sales_update'])->middleware('auth'); //ini membingungkan saat kembali, detail, edit

// Profil
Route::resource('/profil', ProfilController::class)->middleware('auth');
Route::post('/ganti_password', [ProfilController::class, 'ganti_password'])->middleware('auth');

// Route::get('/profil/{User}', [UserController::class, 'detail_profil'])->middleware('auth');
// Route::get('/profil_edit/{User}', [UserController::class, 'edit_profil'])->middleware('auth');
// Route::post('/profil_edit/{User:id}', [UserController::class, 'update_profil'])->middleware('auth');


// BARANG
Route::get('/barangmentahan', [BarangController::class, 'tampilmentahan'])->middleware('admin');
Route::get('/aksesorisjok', [BarangController::class, 'tampiljokaksesoris'])->middleware('admin');
Route::get('/bungkuspacking', [BarangController::class, 'packingbarang'])->middleware('admin');
Route::resource('/barang', BarangController::class)->middleware('admin');

// Transaksi Barang
Route::get('/inventransaksi', [TransaksiBarangController::class, 'tampiltransaksi'])->middleware('admin');
// exsport
Route::get('/pdftransaksi', [TransaksiBarangController::class, 'pdftransaksi'])->middleware('admin');
Route::resource('/transaksibarang', TransaksiBarangController::class)->middleware('admin');

// Order
Route::resource('/order', OrderController::class);

// admin list order
Route::get('/list_permintaan', [OrderController::class, 'permintaan'])->middleware('admin'); //pending / belum di terima
Route::get('/list_order', [OrderController::class, 'list'])->middleware('admin');
Route::get('/order_sales', [OrderController::class, 'order_by_sales'])->middleware('sales');
Route::get('/order_sales/{id}', [OrderController::class, 'order_by_sales_edit'])->middleware('sales');

// Riwayat Order
Route::get('/riwayatOrder', [OrderController::class, 'riwayatOrder'])->middleware('sales');
Route::get('/riwayatOrder/{id_order}', [OrderController::class, 'Detailriwayatorder'])->middleware('sales');

// Riwayat Order
// Route::get('/riwayatOrder/{Order:auth()->user()->id}', [RiwayatOrderController::class, 'riwayatOrder'])->middleware('sales');

// dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// mentahan
Route::resource('/mentahan', ProdMentahanController::class)->middleware('admin');
Route::get('/buat_mentahan/{order_detail}', [ProdMentahanController::class, 'buat_mentahan'])->middleware('admin');

// finishing
Route::resource('/finishing', ProdFinishingController::class)->middleware('admin');
Route::get('/buat_finishing/{finishing_id}', [ProdFinishingController::class, 'buat_finishing'])->middleware('admin');
Route::post('/edit_finishing', [ProdFinishingController::class, 'edit_finishing'])->middleware('admin');
// vendor
Route::resource('/vendor', VendorProduksiController::class)->middleware('admin');

// jok
Route::resource('/jok', ProdJokController::class)->middleware('admin');
Route::get('/buat_jok/{jok_id}', [ProdJokController::class, 'buat_jok'])->middleware('admin');
Route::post('/edit_jok', [ProdJokController::class, 'edit_jok'])->middleware('admin');

// packing
Route::resource('/packing', ProdPackingController::class)->middleware('admin');
Route::get('/buat_packing/{packing_id}', [ProdPackingController::class, 'buat_packing'])->middleware('admin');
Route::post('/edit_packing', [ProdPackingController::class, 'edit_packing'])->middleware('admin');

// pengiriman
Route::resource('/pengiriman', ProdKirimBarangController::class)->middleware('admin');
Route::get('/buat_pengiriman/{pengiriman_id}', [ProdKirimBarangController::class, 'buat_pengiriman'])->middleware('admin');
Route::post('/edit_pengiriman', [ProdKirimBarangController::class, 'edit_pengiriman'])->middleware('admin');

// order Selesai
Route::get('/order_selesai', [OrderController::class, 'order_selesai'])->middleware(['admin', 'auth']);
Route::get('/order_selesai/{id_order_detail}', [OrderController::class, 'detail_order_selesai'])->middleware(['admin', 'auth']);
