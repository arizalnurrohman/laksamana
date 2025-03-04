<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RehabilitasiPerkembanganNilai extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_rehabilitasi_perkembangan_nilai';
    protected $fillable = ['id','rehabilitasi_perkembangan_id','komponen_id','aspek_id','komponen_aspek_nilai','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
