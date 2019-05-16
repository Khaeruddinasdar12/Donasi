<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    // public function donasis(){
    //     return $this->belongsToMany('Donasi');
    // }
    public function donasis()
    {
        return $this->hasOne('App\Donasi', 'foreign_key');
    }
    public function anakyatims()
    {
        return $this->hasOne('App\Anakyatim', 'foreign_key');
    }

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
