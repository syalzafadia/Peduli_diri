<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 
        'name',
        'telp',
        'email',
        'foto',
        'username', 
        'password', 
        'password_confirmation',
        'provinces_id',
        'cities_id',
        'districts_id',
        'villages_id'
    ];

    public function kota()
    {
        return $this->belongsTo('App\tb_kota');
    }

    public function perjalanan()
    {
        return $this->hasMany('App\tb_perjalanan');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\provinsi', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
