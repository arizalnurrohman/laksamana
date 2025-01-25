<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use SoftDeletes;
    
    protected $table    = 'laksa_ms_pasien';
    protected $fillable = ['id','nama_depan','nama_belakang','nik','nokk','tmp_lahir','tgl_lahir','provinsi_id','kota_id','kecamatan_id','kelurahan_desa_id','alamat','domisili_alamat','domisili','agama_id','pendidikan_id','up_foto','up_kk','up_akte_lahir','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
