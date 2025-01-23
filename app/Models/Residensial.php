<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residensial extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_ms_residensial';
    protected $fillable = ['id','petugas_id','tgl_penerimaan','sumber_id','pasien_id','kategori_ppks_id','masa_layanan','rencana_tgl_terminasi','pengampu_id','status','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
