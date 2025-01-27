<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bantuan extends Model
{
    use SoftDeletes;
    
    protected $table    = 'laksa_ms_jenis_bantuan';
    protected $fillable = ['id','jenis_bantuan','sort','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
