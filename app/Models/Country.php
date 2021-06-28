<?php

namespace App\Models;
use App;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }

	public function City(){
  		return $this->hasMany('App\Models\City');
    }

}
