<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilingController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\MasakanController;
use App\Http\Controllers\mejacontroller;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\userController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
    Route::get('/', [AuthController::class, 'user']);
    Route::get('/keranjang', [MobileController::class, 'viewKeranjang']);
    Route::get('/keranjang/checkout', [MobileController::class, 'viewKeranjangCheckout']);
    Route::post('/keranjang/checkout', [MobileController::class, 'bayarKeranjang']);
    Route::get('/biling', [MobileController::class, 'viewBiling'])->middleware(['biling-phone','auth', 'mobile']);
    Route::get('/biling/phone', [MobileController::class, 'viewSaldo']);
    Route::get('/biling/phone/verify', [MobileController::class, 'viewVerify']);
    Route::get('/biling/phone/verify/{id}', [MobileController::class, 'SendVerify']);
    Route::post('/biling/phone/verify', [MobileController::class, 'verifyMobile']);
    Route::post('/biling/phone', [MobileController::class, 'createSaldo']);
    Route::get('/product/{id}', [MobileController::class, 'product']);
    Route::post('/product/{id}', [MobileController::class, 'keranjang'])->middleware('auth');
    Route::get('/keranjang/delete/{id}', [MobileController::class, 'destroy'])->middleware('auth');
    Route::get('/order', [MobileController::class, 'order']);

    Route::prefix('/dashboard')->middleware('auth')->group(function(){
        Route::get('/', [AuthController::class, 'dashboard'])->middleware('auth');
        Route::get('/table', [AuthController::class, 'table'])->middleware('auth');
        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
        Route::prefix('/transaksi')->group(function(){
            Route::get('/', [TransaksiController::class, 'index']);
        });
        Route::prefix('/biling')->group(function(){
            Route::get('/', [BilingController::class, 'index']);
            Route::post('/', [BilingController::class, 'isiSaldo']);
        });
        Route::prefix('/masakan')->group(function(){
            Route::get('/', [MasakanController::class, 'index']);
            Route::post('/', [MasakanController::class, 'store']);
            Route::get('/{id}/{parameter}', [MasakanController::class, 'updatedata']);
        });
        Route::prefix('/order')->group(function(){
            Route::get('/', [OrderController::class, 'index']);
            Route::post('/', [OrderController::class, 'store']);
            Route::get('/detail/{id}', [OrderController::class, 'show']);
        });
        Route::prefix('/keterangan')->group(function(){
            Route::get('/', [KeteranganController::class, 'index']);
            Route::post('/', [KeteranganController::class, 'store']);
        });
        Route::prefix('/meja')->group(function(){
            Route::get('/', [mejacontroller::class, 'index']);
            Route::post('/', [mejacontroller::class, 'store']);
        });
        Route::prefix('/user')->group(function(){
            Route::get('/', [userController::class, 'index']);
            Route::post('/', [userController::class, 'store']);
        });
        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

    Route::prefix('/login')->middleware('guest')->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('login');
        Route::post('/', [AuthController::class, 'authenticating']);
        Route::get('/register', [AuthController::class, 'register']);
        Route::post('/register', [AuthController::class, 'store']);
        Route::get('/verify', [AuthController::class, 'verify'])->middleware('verify-register');
        Route::post('/verify', [AuthController::class, 'verify_kode'])->middleware('verify-register');
        Route::get('/verify/{id}', [AuthController::class, 'send_kode'])->middleware('verify-register');
    });
