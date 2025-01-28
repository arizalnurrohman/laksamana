<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KomponenPerkembangan extends Model
{
    use SoftDeletes;
    
    protected $table    = 'laksa_ms_komponen_perkembangan';
    protected $fillable = ['id','komponen','sort','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
