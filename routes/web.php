<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'auth_login'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('dashboard')->middleware(['web', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/kartu', SuratController::class)->names('surat');
    Route::get('/laporan/kartu/{uuid}/preview', [LaporanController::class, 'kartu_preview'])->name('laporan.kartu.preview');
    Route::get('/laporan/registrasi/preview', [LaporanController::class, 'laporan_preview'])->name('laporan.registrasi.preview');
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/pengaturan/ubah_password', [AuthController::class, 'change_password'])->name('auth.change_password');
});
