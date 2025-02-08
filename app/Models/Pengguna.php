<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
    // use SoftDeletes;

    protected $table    = 'users';
    protected $fillable = ['id','persyaratan','sort','created_at','updated_at'];
    // protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}

