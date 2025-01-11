<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Model
{
    // use SoftDeletes;

    protected $table    = 'users';
    protected $fillable = ['id','name','email','email_verified_at','password','remember_token','created_at','updated_at'];
    // protected $dates    = ['deleted_at'];
    // protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}

