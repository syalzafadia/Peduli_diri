<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_kota extends Model
{
    protected $table = 'tb_kotas';
    protected $fillable =[
        'kota'
    ];

    protected $primaryKey = 'id_kota';

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
