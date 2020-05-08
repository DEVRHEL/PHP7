<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';
    protected $filltable = ['id','name','price'];
    //public $timestamps = false;
    public function color()
    {
    	return $this->belongsToMany('App\Colors','cars_colors','cars_id'); // dat ten cot trong table cho dung chuan vd cars_id vi ten bang kia la car nen cars_id chu khong phai car_id
    }
}
