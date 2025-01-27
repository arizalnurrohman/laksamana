<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RehabilitasiPerkembangan extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_rehabilitasi_perkembangan';
    protected $fillable = ['id','rehabilitasi_id','tgl_perkembangan','foto_perkembangan','file_perkembangan','catatan_perkembangan','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
