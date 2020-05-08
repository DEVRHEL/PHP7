<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangKy extends Model
{
    protected $table = 'db_dk';
    protected $fillable = ['id','monhoc','giatien','giangvien','image'];
    public $timestamps = false;
}
