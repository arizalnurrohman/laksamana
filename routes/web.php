<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssessementController;
use App\Http\Controllers\DataWilayahController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ResidensialController;
use App\Http\Controllers\KategoriKKPSController;
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

Route::get('/kategori-kkps', [KategoriKKPSController::class, 'index'])->name('kategorikkps');
Route::get('/kategori-kkps/load-kategori-kkps', [KategoriKKPSController::class, 'load_data'])->name('load_kategorikkps');
Route::post('/kategori-kkps/store', [KategoriKKPSController::class, 'store'])->name('kategorikkps.store');
Route::get('/kategori-kkps/edit/{id}', [KategoriKKPSController::class, 'edit'])->name('kategorikkps.edit');
Route::post('/kategori-kkps/update', [KategoriKKPSController::class, 'update'])->name('kategorikkps.update');
Route::delete('/kategori-kkps/delete/{id}', [KategoriKKPSController::class, 'destroy'])->name('kategorikkps.delete');

Route::get('/kategori-kkps/list-sub/{id}', [KategoriKKPSController::class, 'sub_ppsk'])->name('sub_kategorikkps');
Route::get('/kategori-kkps/load-kategori-kkps/{id}', [KategoriKKPSController::class, 'load_data_sub'])->name('load_kategorikkps_sub');
Route::post('/kategori-kkps/sub-store', [KategoriKKPSController::class, 'sub_store'])->name('sub_kategorikkps.store');

Route::get('/kategori-kkps/list-sub/child/{id}', [KategoriKKPSController::class, 'sub_child_ppsk'])->name('subchild_kategorikkps');
Route::get('/kategori-kkps/list-sub/child/load_list/{id}', [KategoriKKPSController::class, 'load_sub_child_list_ppsk'])->name('load_subchildlist_kategorikkps');
Route::delete('/kategori-kkps/list-sub/child/delete/{id}', [KategoriKKPSController::class, 'destroy_sub_child'])->name('subchild_kategorikkps.delete');


Route::get('/persyaratan', [PersyaratanController::class, 'index'])->name('persyaratan');
Route::get('/persyaratan/load-persyaratan', [PersyaratanController::class, 'load_data'])->name('load_persyaratan');
Route::post('/persyaratan/store', [PersyaratanController::class, 'store'])->name('persyaratan.store');
Route::get('/persyaratan/edit/{id}', [PersyaratanController::class, 'edit'])->name('persyaratan.edit');
Route::post('/persyaratan/update', [PersyaratanController::class, 'update'])->name('persyaratan.update');
Route::delete('/persyaratan/delete/{id}', [PersyaratanController::class, 'destroy'])->name('persyaratan.delete');

Route::get('/asrama', [AsramaController::class, 'index'])->name('asrama');
Route::get('/assessement', [AssessementController::class, 'index'])->name('assessement');

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::get('/pasien/load-pasien', [PasienController::class, 'load_data'])->name('load_pasien');
Route::delete('/pasien/delete/{id}', [PasienController::class, 'destroy'])->name('pasien.delete');

Route::get('/residensial', [ResidensialController::class, 'index'])->name('residensial');
Route::get('/residensial/create', [ResidensialController::class, 'create'])->name('residensial.create');
Route::post('/residensial', [ResidensialController::class, 'store'])->name('residensial.store');
Route::get('/residensial/edit/{id}', [ResidensialController::class, 'edit'])->name('residensial.edit');
Route::put('/residensial/{id}', [ResidensialController::class, 'update'])->name('residensial.update');
Route::get('/residensial/load-residensial', [ResidensialController::class, 'load_residensial'])->name('load_residensial');
Route::delete('/residensial/delete/{id}', [ResidensialController::class, 'destroy'])->name('residensial.delete');
Route::get('/residensial/get-pasien/{id}', [ResidensialController::class, 'residensial_get_pasien']);
Route::get('/residensial/get-ppks/{id}', [ResidensialController::class, 'getSubKategori']);

Route::get('/non-residensial', [NonResidensialController::class, 'index'])->name('nonresidensial');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');

Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
Route::post('/permission', [PermissionController::class, 'store'])->name('permission.store');
Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
Route::put('/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');
Route::get('/permission/{id}', [PermissionController::class, 'show'])->name('permission.show');
Route::delete('/permission', [PermissionController::class, 'destroy'])->name('permission.destroy');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/database', [DatabaseController::class, 'index'])->name('database');


