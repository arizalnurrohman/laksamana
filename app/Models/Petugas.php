<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Petugas extends Model
{
    use SoftDeletes;
    
    protected $table    = 'laksa_ms_pendamping_sosial';
    protected $fillable = ['id','user_id','nip_nik','nama_petugas','pangkat_jabatan','instansi','alamat_kantor','pegawai_id','kabupaten_kota_id','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
