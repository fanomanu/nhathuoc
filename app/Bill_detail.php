<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = 'bill_details';

    protected $fillable = ['bill_id','product_id','price','quantity'];

    public function bill(){
    	return $this->belongsTo('App/Bill');
    }

    public function product(){
    	return $this->belongsTo('App/Product');
    }
}
