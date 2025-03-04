<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanTerminasi extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_laporan_terminasi';
    protected $fillable = ['id','layanan_id','dokumen_terminasi','tgl_terminasi','nomor_terminasi','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
