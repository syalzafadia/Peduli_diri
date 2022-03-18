<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    //use HasFactory;
    protected $table = 'indonesia_cities';
    protected $fillable = [
        'name',
        'province_id'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}


