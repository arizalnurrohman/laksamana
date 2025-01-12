<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
     use SoftDeletes;
    protected $table    = 'menu';
    protected $fillable = ['id','parent_id','menu','description','icon','url','access','sort','created_at','updated_at','deleted_at'];
    protected $dates    = ['deleted_at'];
    protected $keyType  = 'string';

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id','id')->orderBy('sort');
    }
}
