<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAssessmentFormValue extends Model
{
    use SoftDeletes;

    protected $table    = 'laksa_tr_assessment_value';
    protected $fillable = ['id','form_assessment_id','form_assessment_sub_id','assessment_id','assessment_value','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
