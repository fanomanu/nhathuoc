<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $table='privileges';

    protected $fillable = ['menu_id','user_level','level'];

    public function menu(){
    	return $this->belongsTo('App/Menu');
    }
}
