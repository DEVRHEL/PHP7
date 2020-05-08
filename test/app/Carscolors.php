<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carscolors extends Model
{
    protected $table = 'cars_colors';
    protected $filltable = ['id','cars_id','colors_id'];
    //public $timestamps = false;
}
