<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerujukController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ListAspekController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssessementController;
use App\Http\Controllers\DataWilayahController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ResidensialController;
use App\Http\Controllers\KategoriKKPSController;
use App\Http\Controllers\RehabilitasiController;
use App\Http\Controllers\StatusUsulanController;
use App\Http\Controllers\NonResidensialController;
use App\Http\Controllers\PetugasLayananController;
use App\Http\Controllers\FormAssessementController;


use App\Http\Controllers\LaporanTerminasiController;
use App\Http\Controllers\PenentuanLayananController;
use App\Http\Controllers\LaporanAssessmentController;
use App\Http\Controllers\PersetujuanKepalaController;
use App\Http\Controllers\LaporanBeritaAcaraController;
use App\Http\Controllers\LaporanPerkembanganController;
use App\Http\Controllers\KomponenPerkembanganController;
use App\Http\Controllers\LaporanPPKSTerminasiController;
use App\Http\Controllers\LaporanPenerimaanPPKSController;
use App\Http\Controllers\LaporanPendampingSosialController;

Route::get('/dashboards', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/data-akses-pengguna', [PenggunaController::class, 'index'])->name('dataaksespengguna');

    Route::get('/data-wilayah', [DataWilayahController::class, 'index'])->name('datawilayah');

    Route::get('/komponen-perkembangan', [KomponenPerkembanganController::class, 'index'])->name('komponenperkembangan');
    Route::get('/komponen-perkembangan/load-persyaratan', [KomponenPerkembanganController::class, 'load_data'])->name('load_komponen_perkembangan');
    Route::post('/komponen-perkembangan/store', [KomponenPerkembanganController::class, 'store'])->name('komponenperkembangan.store');
    Route::get('/komponen-perkembangan/edit/{id}', [KomponenPerkembanganController::class, 'edit'])->name('komponenperkembangan.edit');
    Route::post('/komponen-perkembangan/update', [KomponenPerkembanganController::class, 'update'])->name('komponenperkembangan.update');
    Route::delete('/komponen-perkembangan/delete/{id}', [KomponenPerkembanganController::class, 'destroy'])->name('komponenperkembangan.delete');

    Route::get('/list-aspek', [ListAspekController::class, 'index'])->name('listaspek');
    Route::get('/list-aspek/load-persyaratan', [ListAspekController::class, 'load_data'])->name('load_aspek');
    Route::post('/list-aspek/store', [ListAspekController::class, 'store'])->name('listaspek.store');
    Route::get('/list-aspek/edit/{id}', [ListAspekController::class, 'edit'])->name('listaspek.edit');
    Route::post('/list-aspek/update', [ListAspekController::class, 'update'])->name('listaspek.update');
    Route::delete('/list-aspek/delete/{id}', [ListAspekController::class, 'destroy'])->name('listaspek.delete');

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
    Route::post('/assessement/kirim-koordinator/{id}', [AssessementController::class, 'store_kirim_koordinator'])->name('assessement.kirim_koordinator');
    Route::get('/assessement/edit/{id}', [AssessementController::class, 'edit_Assessment'])->name('edit_assessement');

    Route::get('/assessement/reviu-perkembangan-dokumen/{id}', [AssessementController::class, 'reviuDokumenPerkembangan'])->name('assessement.reviu_perkembangan');
    Route::post('/assessement/reviu-perkembangan-dokumen/', [AssessementController::class, 'reviuKirimPerkembangan'])->name('assessement.reviu_send_perkembangan');


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
    Route::post('/residensial/kirim-accessor/{id}', [ResidensialController::class, 'store_kirim_accessor'])->name('residensial.kirim_accessor');
    Route::post('/residensial/generate-berita-acara/{id}', [ResidensialController::class, 'store_generate_ba'])->name('residensial.generate_ba');
    Route::get('/residensial/get-residensial/{id}', [ResidensialController::class, 'getResidensial'])->name('residensial_getresidensial');
    Route::post('/residensial/store-manajer-kasus/', [ResidensialController::class, 'store_ManajerKasus'])->name('residensial.store_manajer_kasus');
    Route::post('/residensial/terminasi-layanan/{id}', [ResidensialController::class, 'store_TerminasiLayanan'])->name('residensial.store_terminasi_layanan');
    



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
    Route::post('/persetujuan-kepala', [PersetujuanKepalaController::class, 'store'])->name('persetujuankepala.store');
    Route::get('/persetujuan-kepala/load-persetujuan-kepala', [PersetujuanKepalaController::class, 'load_persetujuan_kepala'])->name('load_persetujuan_kepala');
    Route::get('/persetujuan-kepala/edit/{id}', [PersetujuanKepalaController::class, 'edit'])->name('persetujuankepala.detail');
    Route::get('/persetujuan-kepala/reviu-perkembangan-dokumen/{id}', [PersetujuanKepalaController::class, 'reviuDokumenPerkembangan'])->name('persetujuankepala.reviu_perkembangan');
    Route::post('/persetujuan-kepala/reviu-perkembangan-dokumen/', [PersetujuanKepalaController::class, 'reviuKirimPerkembangan'])->name('persetujuankepala.reviu_send_perkembangan');

    Route::get('/pengampu', [PengampuController::class, 'index'])->name('pengampu');

    Route::get('/data-intervensi', [PengampuController::class, 'index'])->name('dataintervensi');
    // Route::get('/penentuan-layanan', [PenentuanLayananController::class, 'index'])->name('penentuanlayanan');

    Route::get('/rehabilitasi', [RehabilitasiController::class, 'index'])->name('rehabilitasi');
    Route::get('/rehabilitasi/load-rehabilitasi', [RehabilitasiController::class, 'load_data'])->name('load_rehabilitasi');
    Route::get('/rehabilitasi/detail/{id}', [RehabilitasiController::class, 'detail'])->name('rehabilitasi.detail');
    Route::get('/rehabilitasi/load-rehabilitasi-perkembangan/{id}', [RehabilitasiController::class, 'load_data_perkembangan'])->name('load_rehabilitasi_perkembangan');
    Route::post('/rehabilitasi/store-perkembangan', [RehabilitasiController::class, 'store_PerkembanganRehabilitasi'])->name('rehabilitasi.store_perkembangan');
    Route::post('/rehabilitasi/store-intervensi', [RehabilitasiController::class, 'store_Intervensi'])->name('rehabilitasi.store_intervensi');
    Route::post('/rehabilitasi/store-perkembangan-update', [RehabilitasiController::class, 'store_PerkembanganRehabilitasiUpdate'])->name('rehabilitasi.store_perkembangan_update');
    Route::get('/rehabilitasi/rehabilitasi-perkembangan/{id}', [RehabilitasiController::class, 'get_rehabilitasiPerkembangan'])->name('rehabilitasi.rehabilitasi_perkembangan');
    Route::delete('/rehabilitasi/perkembangan-delete/{id}', [RehabilitasiController::class, 'destroy'])->name('rehabilitasi.delete_perkembangan');
    Route::get('/rehabilitasi/generate-rehabilitasi/{id}', [RehabilitasiController::class, 'generate_rehabilitasi'])->name('rehabilitasi.generate_rehabilitasi');
    Route::get('/rehabilitasi/laporan-rehabilitasi/{id}', [RehabilitasiController::class, 'rehabilitasiLaporan'])->name('rehabilitasi.laporan_rehabilitasi');
    Route::get('/rehabilitasi/ajukan-terminasi/{id}', [RehabilitasiController::class, 'ajukanTerminasi'])->name('rehabilitasi.ajukan_terminasi');

    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::get('/petugas/load-petugas', [PetugasController::class, 'load_data'])->name('load_petugas');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::post('/petugas/update', [PetugasController::class, 'update'])->name('petugas.update');
    Route::get('/petugas/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas.delete');

    Route::get('/perujuk', [PerujukController::class, 'index'])->name('perujuk');
    Route::get('/perujuk/load-perujuk', [PerujukController::class, 'load_data'])->name('load_perujuk');
    Route::post('/perujuk/store', [PerujukController::class, 'store'])->name('perujuk.store');
    Route::get('/perujuk/edit/{id}', [PerujukController::class, 'edit'])->name('perujuk.edit');
    Route::post('/perujuk/update', [PerujukController::class, 'update'])->name('perujuk.update');
    Route::delete('/perujuk/delete/{id}', [PerujukController::class, 'destroy'])->name('perujuk.delete');

    Route::get('/laporan-berita-acara', [LaporanBeritaAcaraController::class, 'index'])->name('laporanberitaacara');
    Route::get('/laporan-berita-acara/load-berita-acara', [LaporanBeritaAcaraController::class, 'load_laporan'])->name('load_beritaacara');
    Route::get('/laporan-berita-acara/edit/{id}', [LaporanBeritaAcaraController::class, 'get_ba'])->name('laporanberitaacara.getba');

    Route::get('/laporan-termininasi', [LaporanTerminasiController::class, 'index'])->name('laporantermininasi');
    Route::get('/laporan-termininasi/load-laporan-terminasi', [LaporanTerminasiController::class, 'load_laporan'])->name('load_laporantermininasi');
    Route::get('/laporan-termininasi/edit/{id}', [LaporanTerminasiController::class, 'get_laporanterminasi'])->name('laporantermininasi.getlaporan');

    Route::get('/laporan-dokumen-assessment', [LaporanAssessmentController::class, 'index'])->name('laporanassessment');
    Route::get('/laporan-dokumen-assessment/load-laporan-assessment', [LaporanAssessmentController::class, 'load_laporan'])->name('load_laporanassessment');
    Route::get('/laporan-dokumen-assessment/edit/{id}', [LaporanAssessmentController::class, 'get_laporanassessment'])->name('laporanassessment.getlaporan');

    Route::get('/laporan-perkembangan', [LaporanPerkembanganController::class, 'index'])->name('laporanperkembangan');
    Route::get('/laporan-perkembangan/load-laporan-perkembangan', [LaporanPerkembanganController::class, 'load_laporan'])->name('load_laporanperkembangan');
    Route::get('/laporan-perkembangan/edit/{id}', [LaporanPerkembanganController::class, 'get_laporanperkembangan'])->name('laporanperkembangan.getlaporan');

    Route::get('/petugas-layanan', [PetugasLayananController::class, 'index'])->name('petugaslayanan');
    Route::get('/petugas-layanan/load-perujuk', [PetugasLayananController::class, 'load_data'])->name('load_petugaslayanan');
    Route::post('/petugas-layanan/store', [PetugasLayananController::class, 'store'])->name('petugaslayanan.store');
    Route::get('/petugas-layanan/edit/{id}', [PetugasLayananController::class, 'edit'])->name('petugaslayanan.edit');
    Route::post('/ppetugas-layanan/update', [PetugasLayananController::class, 'update'])->name('petugaslayanan.update');
    Route::delete('/petugas-layanan/delete/{id}', [PetugasLayananController::class, 'destroy'])->name('petugaslayanan.delete');

    Route::get('/laporan-penerimaan-ppks', [LaporanPenerimaanPPKSController::class, 'index'])->name('laporanpenerimaanppks');
    Route::post('/laporan-penerimaan-ppks/download', [LaporanPenerimaanPPKSController::class, 'download_excel'])->name('download_laporanpenerimaanppks');

    Route::get('/laporan-pendamping-sosial', [LaporanPendampingSosialController::class, 'index'])->name('laporanpendampingsosial');
    Route::get('/laporan-ppks-terminasi', [LaporanPPKSTerminasiController::class, 'index'])->name('laporanppksterminasi');
    

    
    

});

require __DIR__.'/auth.php';