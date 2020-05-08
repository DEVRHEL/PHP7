<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';
    protected $filltable = ['id','name'];
    //public $timestamps = false;
    public function car()
    {
    	return $this->belongsToMany('App\Cars','cars_colors');
    }
}
