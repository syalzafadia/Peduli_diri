<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'indonesia_provinces';
    protected $fillable = [
        'name',
    ];

    public function User()
    {
        return $this->hasMany('App\User');
    }

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
