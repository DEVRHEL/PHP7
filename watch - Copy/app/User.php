<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected $fillable = [
        'username', 'password', 'email', 'level',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

//    protected $casts = [
//        'email_verified_at' => 'datetime',
//    ];
    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
