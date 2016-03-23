<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table = 'product_images';

    protected $fillable = ['product_id','image'];

    public function product(){
    	return $this->belongTo('App/Product');
    }
}
