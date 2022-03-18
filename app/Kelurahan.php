<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //use HasFactory;
    protected $table = 'indonesia_villages';
    protected $fillable = [
        'name',
        'district_id'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
