<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residensial extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_layanan';
    protected $fillable = ['id','petugas_id','perujuk_id','jenis_layanan','tgl_penerimaan','sumber_id','pasien_id','kategori_ppks_id','kategori_ppks_json','masa_layanan','rencana_tgl_terminasi','pengampu_id','status_id','dokumen_ba','dokumen_ba_tgl','dokumen_ba_tempat','dokumen_ba_nomor','gedung_id','up_dokumen_rujukan','ragam_abh','informasi_kasus','jenis_rujukan','no_putusan_pengadilan','ragam_anak','ragam_kelompok_rentan','ragam_penyandang_disabilitas','ragam_disabilitas_fisik','ragam_disabilitas_intelektual','ragam_disabilitas_mental','ragam_disabilitas_sensorik','disabilitas_ganda_multi','penerima_atensi','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
