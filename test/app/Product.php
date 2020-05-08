<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'ab';
    protected $filltable = ['id','hoten','sdt','gmail'];
    // protected $hidden = ['password'];
    public $timestamps = false; // khong hien thi du lieu timestamps
    static function test()
    {
    	return self::find(4);
    }
    public function images()
    {
    	return $this->hasMany('App\Images');
    }
}
