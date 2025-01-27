<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengampu extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_ms_pengampu';
    protected $fillable = [ 'id','nama_pengampu','hubungan_dengan_ppks','tmp_lahir','tgl_lahir','jenis_kelamin','agama_id','nik','nokk','sudah_ada_dtks','bantuan_saat_ini','pendidikan_id','status_kawin','pekerjaan','pengeluaran_perbulan','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
