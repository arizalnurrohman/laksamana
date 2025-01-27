<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rehabilitasi extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_rehabilitasi';
    protected $fillable = ['id','residensial_id','petugas_id','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
