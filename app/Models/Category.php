<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getNameAttribute($value) {
    return $this->{'name_' . App::getLocale()};
    }

	public function restaurants(){
    	return $this->belongsToMany('App\Models\Restaurant','restaurant_categories');
    }
}
