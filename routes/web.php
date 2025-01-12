<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengguna', [App\Http\Controllers\PenggunaController::class, 'index'])->name('pengguna');
Route::get('/akses-pengguna', [App\Http\Controllers\AksesPenggunaController::class, 'index'])->name('akses_pengguna');

Route::get('/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission');
Route::post('/permission', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
Route::get('/permission/{id}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
Route::put('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
Route::get('/permission/{id}', [App\Http\Controllers\PermissionController::class, 'show'])->name('permission.show');
Route::delete('/permission', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');

Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
