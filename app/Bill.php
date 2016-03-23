<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = ['type','date','deli_name','deli_addr','deli_phone','sub_total','total','payment','payment_method','note','status','user_id'];

    public function user(){
    	return $this->belongsTo('App/User','user_id')
    }

    public function billDetail(){
    	return $this->hasMany('App/Bill_detail');
    }
}
