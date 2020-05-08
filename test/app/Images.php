<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $filltable = ['id','name','product_id'];
    // protected $hidden = ['password'];
    public $timestamps = false; // khong hien thi du lieu timestamps
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
