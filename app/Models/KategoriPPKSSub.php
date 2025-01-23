<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPPKSSub extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_ms_kategori_ppks_sub';
    protected $fillable = ['id','kategori_id','sub_kategori_ppks','sort','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
