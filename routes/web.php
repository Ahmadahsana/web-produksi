<?php

use App\Models\Order;
use App\Models\Prod_mentahan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SalessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdMentahanController;
use App\Http\Controllers\ProdFinishingController;
use App\Http\Controllers\VendorProduksiController;
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

Route::post('/logout', [LoginController::class, 'logout']);

// Admin //sales
Route::resource('/sales', UserController::class)->middleware('auth');
Route::get('/sales_show/{user}', [UserController::class, 'show_sales']);
Route::put('/sales_update/{sales}', [UserController::class, 'sales_update']);

// BARANG
Route::get('/mentahan_barang', [BarangController::class, 'tampilmentahan'])->middleware('auth');
Route::get('/jok_aksesoris_barang', [BarangController::class, 'tampiljokaksesoris'])->middleware('auth');
Route::get('/packing_barang', [BarangController::class, 'packingbarang'])->middleware('auth');
Route::resource('/barang', BarangController::class);

// Transaksi Barang
Route::resource('/transaksibarang', TransaksiBarangController::class)->middleware('auth');

// sales
Route::resource('/order', OrderController::class)->middleware('auth');

// admin list order
Route::get('/list_permintaan', [OrderController::class, 'permintaan']); //pending / belum di terima
Route::get('/list_order', [OrderController::class, 'list']);
Route::get('/order_sales', [OrderController::class, 'order_by_sales']);
Route::get('/order_sales/{id}', [OrderController::class, 'order_by_sales_edit']);

// dashboard admin
Route::get('/dashboard', [DashboardController::class, 'index']);

// mentahan
Route::resource('/mentahan', ProdMentahanController::class);
Route::get('/buat_mentahan/{order_detail}', [ProdMentahanController::class, 'buat_mentahan']);

// finishing
Route::resource('/finishing', ProdFinishingController::class);
Route::get('/buat_finishing/{finishing_id}', [ProdFinishingController::class, 'buat_finishing']);
Route::post('/edit_finishing', [ProdFinishingController::class, 'edit_finishing']);
// vendor
Route::resource('/vendor', VendorProduksiController::class)->middleware('auth');
