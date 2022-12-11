<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalessController;
use App\Http\Controllers\TransaksiBarangController;
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

// ini dari branch fitur jajal hahahaha

Route::get('/', function () {
    return view('dashboard.layout.main');
})->middleware('auth');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

// Admin //sales
Route::resource('/sales', SalesController::class)->middleware('auth');
Route::get('/sales_show/{sales}', [SalesController::class, 'show_sales']);
Route::put('/sales_update/{sales}', [SalesController::class, 'sales_update']);

// BARANG
Route::resource('/barang', BarangController::class)->middleware('auth');

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
