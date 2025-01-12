<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssessementController;
use App\Http\Controllers\DataWilayahController;
use App\Http\Controllers\ResidensialController;
use App\Http\Controllers\NonResidensialController;
use App\Http\Controllers\FormAssessementController;
use App\Http\Controllers\KomponenInterrvensiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/data-akses-pengguna', [PenggunaController::class, 'index'])->name('dataaksespengguna');

Route::get('/data-wilayah', [DataWilayahController::class, 'index'])->name('datawilayah');
Route::get('/komponen-intervensi', [KomponenInterrvensiController::class, 'index'])->name('komponenintervensi');
Route::get('/form-assessement', [FormAssessementController::class, 'index'])->name('formassessement');

Route::get('/asrama', [AsramaController::class, 'index'])->name('asrama');
Route::get('/assessement', [AssessementController::class, 'index'])->name('assessement');
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
Route::get('/residensial', [ResidensialController::class, 'index'])->name('residensial');
Route::get('/non-residensial', [NonResidensialController::class, 'index'])->name('nonresidensial');



Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
Route::get('/permission/{id}', [PermissionController::class, 'show'])->name('permission.show');
Route::delete('/permission', [PermissionController::class, 'destroy'])->name('permission.destroy');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
