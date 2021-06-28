<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function getNameAttribute($value) {
    return $this->{'name_' . App::getLocale()};
    }

	public function Country(){
    	return $this->belongsTo('App\Models\Country');
    }

     public function Restaurant(){
    	return $this->hassMany('App\Models\Restaurant');
    }
}
