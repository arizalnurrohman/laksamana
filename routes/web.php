<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssessementController;
use App\Http\Controllers\DataWilayahController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ResidensialController;
use App\Http\Controllers\KategoriKKPSController;
use App\Http\Controllers\StatusUsulanController;
use App\Http\Controllers\NonResidensialController;
use App\Http\Controllers\FormAssessementController;
use App\Http\Controllers\PersetujuanKepalaController;
use App\Http\Controllers\KomponenInterrvensiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/data-akses-pengguna', [PenggunaController::class, 'index'])->name('dataaksespengguna');

Route::get('/data-wilayah', [DataWilayahController::class, 'index'])->name('datawilayah');
Route::get('/komponen-intervensi', [KomponenInterrvensiController::class, 'index'])->name('komponenintervensi');

#FORM ASSESSMENT
Route::get('/form-assessement', [FormAssessementController::class, 'index'])->name('formassessement');
Route::get('/form-assessement/load-form-assessement', [FormAssessementController::class, 'load_data'])->name('load_formassessement');
Route::post('/form-assessement/store', [FormAssessementController::class, 'store'])->name('formassessement.store');
Route::get('/form-assessement/edit/{id}', [FormAssessementController::class, 'edit'])->name('formassessement.edit');
Route::post('/form-assessement/update', [FormAssessementController::class, 'update'])->name('formassessement.update');
Route::delete('/form-assessement/delete/{id}', [FormAssessementController::class, 'destroy'])->name('formassessement.delete');

Route::get('/form-assessement/list-sub/{id}', [FormAssessementController::class, 'get_assessment'])->name('sub_formassessement');
Route::get('/form-assessement/load-form-assessement/{id}', [FormAssessementController::class, 'load_data_sub'])->name('load_formassessement_sub');
Route::post('/form-assessement/sub-store', [FormAssessementController::class, 'sub_store'])->name('sub_formassessement.store');

Route::get('/form-assessement/list-sub/child/{id}', [FormAssessementController::class, 'sub_child_assessement'])->name('subchild_formassessement');
Route::get('/form-assessement/list-sub/child/load_list/{id}', [FormAssessementController::class, 'load_sub_child_list_assessment'])->name('load_subchildlist_formassessement');
Route::delete('/form-assessement/list-sub/child/delete/{id}', [FormAssessementController::class, 'destroy_sub_child'])->name('subchild_formassessement.delete');
#END OF------------------------------------------------------------------------------------------------------------------------------

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

Route::get('/assessement', [AssessementController::class, 'index'])->name('assessement');
Route::get('/assessement/load-assessement', [AssessementController::class, 'load_assessement'])->name('load_assessement');
Route::get('/assessement/assessement/{id}', [AssessementController::class, 'get_assessement'])->name('check_assessement');
Route::post('/assessement', [AssessementController::class, 'store'])->name('assessement.store');

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
Route::get('/residensial/get-ppks-child/{id}', [ResidensialController::class, 'getSubKategoriChild']);
Route::post('/residensial/kirim-kekepala/{id}', [ResidensialController::class, 'store_kirim_kekepala'])->name('residensial.kirim_kekepala');



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

Route::get('/status-usulan', [StatusUsulanController::class, 'index'])->name('status_usulan');
Route::get('/status-usulan/load-status', [StatusUsulanController::class, 'load_data'])->name('load_status');
Route::post('/status-usulan/store', [StatusUsulanController::class, 'store'])->name('status_usulan.store');
Route::get('/status-usulan/edit/{id}', [StatusUsulanController::class, 'edit'])->name('status_usulan.edit');
Route::post('/status-usulan/update', [StatusUsulanController::class, 'update'])->name('status_usulan.update');
Route::delete('/status-usulan/delete/{id}', [StatusUsulanController::class, 'destroy'])->name('status_usulan.delete');

Route::get('/gedung-asrama', [GedungController::class, 'index'])->name('gedung_asrama');
Route::get('/gedung-asrama/load-gedung-asrama', [GedungController::class, 'load_data'])->name('load_gedung_asrama');
Route::post('/gedung-asrama/store', [GedungController::class, 'store'])->name('gedung_asrama.store');
Route::get('/gedung-asrama/edit/{id}', [GedungController::class, 'edit'])->name('gedung_asrama.edit');
Route::post('/gedung-asrama/update', [GedungController::class, 'update'])->name('gedung_asrama.update');
Route::delete('/gedung-asrama/delete/{id}', [GedungController::class, 'destroy'])->name('gedung_asrama.delete');

Route::get('/persetujuan-kepala', [PersetujuanKepalaController::class, 'index'])->name('persetujuankepala');
Route::get('/persetujuan-kepala/load-persetujuan-kepala', [PersetujuanKepalaController::class, 'load_persetujuan_kepala'])->name('load_persetujuan_kepala');
Route::get('/persetujuan-kepala/edit/{id}', [PersetujuanKepalaController::class, 'edit'])->name('persetujuankepala.detail');

Route::get('/pengampu', [PengampuController::class, 'index'])->name('pengampu');
