<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TasRajutController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\KostumerController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Middleware\CheckLoginMiddleware;
use App\Http\Controllers;
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

// Route::group(['middleware'=>'CheckLoginMiddleware'],function(){
    // Route::get('/', [AdminController::class, 'index']);
    //====================ADMIN==========================

    //Profile Admin
    Route::get('/admin/profile/{id_user}',[ProfileController::class,'index']);

    //Kelola Tas Rajut
    Route::get('/admin/dashboard/kelolaTasRajut',[TasRajutController::class, 'index']);
    Route::get('/tambahTasRajut',[TasRajutController::class, 'formTambahTasRajut']);
    Route::post('/tambahTasRajut',[TasRajutController::class, 'tambahTasRajut']);
    Route::post('/tambahGambar',[TasRajutController::class, 'tambahGambar']);
    Route::post('/penjualan/{id_tas}',[TasRajutController::class, 'penjualanTas']);
    //Kelola Bahan Baku
    Route::get('/admin/dashboard/kelolaBahanBaku',[BahanBakuController::class, 'index']);
    Route::get('/tambahBahanBaku',[BahanBakuController::class, 'formBahanBaku']);
    Route::post('/tambahBahanBaku/tambah',[BahanBakuController::class,'tambahBahanBaku']);
    Route::post('/updateBahanBaku/penambahan/{nama_bahanBaku}',[BahanBakuController::class,'penambahanBahanBaku']);
    Route::post('/updateBahanBaku/pengurangan/{nama_bahanBaku}',[BahanBakuController::class,'penguranganBahanBaku']);
    
    //Kelola Penjualan
    Route::get('/admin/dashboard/kelolaPenjualan',[PenjualanController::class, 'index']);

    //Kelola Kostumer
    Route::get('/admin/dashboard/kelolaKostumer',[KostumerController::class, 'index']);

    //====================KOSTUMER==========================
    //Main Page
    Route::get('/main',[MainPageController::class,'kostumerMain']);

    //Chart
    Route::get('/chart',[ChartController::class,'index']);

    //Store
    Route::get('/store',[StoreController::class,'index']);
// });
Route::get('/', [MainPageController::class,'index']);
Route::get('/login',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);