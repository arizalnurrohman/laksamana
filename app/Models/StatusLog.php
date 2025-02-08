<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusLog extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_status';
    protected $fillable = ['id','jenis_layanan','layanan_id','status_id','user_id','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
