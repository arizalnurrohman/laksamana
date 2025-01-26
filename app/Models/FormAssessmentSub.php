<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAssessmentSub extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_ms_form_assessment_sub';
    protected $fillable = ['id','form_assessment_id','sub_kategori_assessment','parent_id','sort','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
