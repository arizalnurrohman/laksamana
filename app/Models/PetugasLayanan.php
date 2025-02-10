<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetugasLayanan extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_ms_petugas_layanan';
    protected $fillable = ['id','user_id','nip_nik','nama_petugas','jabatan','alamat_kantor','telp_kantor','no_hp','email_petugas','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}

