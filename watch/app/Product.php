<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'alias', 'price', 'intro', 'content', 'image', 'keywords', 'description', 'user_id', 'cate_id'];
    public $timestamps=true;
    public function cate()
    {
        return $this->belongsTo('App\Cate');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function pimage()
    {
        return $this->hasMany('App\ProductImage');
        //return $this->hasMany('App\ProductImage','products_id'->> col cua bang productimage);
    }
}
