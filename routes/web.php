<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\IKDController;
use App\Http\Controllers\CetakRekamController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['isLogin'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
});

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// ================= CHECK LOGIN =================
Route::middleware(['checkLogin'])->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ================= ADMIN =================
    Route::middleware(['isAdmin'])->group(function () {

        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('user/store', [UserController::class, 'store'])->name('userStore');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    });

    // ================= OPERATOR CETAK =================
    Route::middleware(['isOperatorCetak'])->group(function () {

        Route::get('cetak', [CetakController::class, 'index'])->name('cetak');
        Route::get('cetak/riwayat', [CetakController::class, 'riwayat'])->name('cetakRiwayat');
        
        Route::middleware(['isNotAdmin'])->group(function () {
            Route::get('cetak/create', [CetakController::class, 'create'])->name('cetakCreate');
            Route::post('cetak/store', [CetakController::class, 'store'])->name('cetakStore');
        });

        Route::get('cetak/edit/{id}', [CetakController::class, 'edit'])->name('cetakEdit');
        Route::post('cetak/update/{id}', [CetakController::class, 'update'])->name('cetakUpdate');
        Route::delete('cetak/destroy/{id}', [CetakController::class, 'destroy'])->name('cetakDestroy');

    });

    // ================= OPERATOR REKAM =================
    Route::middleware(['isOperatorRekam'])->group(function () {
        // Rekam KTP
        Route::get('rekam', [RekamController::class, 'index'])->name('rekam');

            // ❌ ADMIN DILARANG
        Route::middleware(['isNotAdmin'])->group(function () {
            Route::get('rekam/create', [RekamController::class, 'create'])->name('rekamCreate');
            Route::post('rekam/store', [RekamController::class, 'store'])->name('rekamStore');
        });

        Route::get('rekam/edit/{id}', [RekamController::class, 'edit'])->name('rekamEdit');
        Route::post('rekam/update/{id}', [RekamController::class, 'update'])->name('rekamUpdate');
        Route::delete('rekam/destroy/{id}', [RekamController::class, 'destroy'])->name('rekamDestroy');

    });

    // IKD Semua Jabatan Bisa Akses
        Route::get('ikd', [IKDController::class, 'index'])->name('ikd');
        Route::get('ikd/create', [IKDController::class, 'create'])->name('ikdCreate');
        Route::post('ikd/store', [IKDController::class, 'store'])->name('ikdStore');
        Route::get('ikd/edit/{id}', [IKDController::class, 'edit'])->name('ikdEdit');
        Route::post('ikd/update/{id}', [IKDController::class, 'update'])->name('ikdUpdate');
        Route::delete('ikd/destroy/{id}', [IKDController::class, 'destroy'])->name('ikdDestroy');


});
