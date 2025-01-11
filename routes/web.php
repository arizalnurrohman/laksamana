<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna');
Route::get('/akses-pengguna', [App\Http\Controllers\AksesPenggunaController::class, 'index'])->name('akses_pengguna');
Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission');