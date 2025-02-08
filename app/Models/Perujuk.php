<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perujuk extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_ms_perujuk';
    protected $fillable = ['id','nama_perujuk','nip_nrp','pangkat_jabatan','instansi_perujuk','alamat_kantor','telp_kantor','no_hp','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
