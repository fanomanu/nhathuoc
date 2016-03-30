<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name','alias','unit_type','price','intro','content','image','keyword','description','status'];

    public function category(){
    	return $this->belongTo('App\Category');
    }

    public function user(){
    	return $this->belongTo('App\User');
    }

    public function detail_image(){
    	return $this->hasMany('App\Product_Image');
    }

    public function bill_detail(){
        return $this->hasMany('App\Bill_detail');
    }
}
