<?php

namespace App\Models;
use App;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = ['id','name_ar','name_en','address','latitude','longitude','phone','city_id','table_count','people_limit'];
    protected $table = "restaurants";

    public function getNameAttribute($value) {
    return $this->{'name_' . App::getLocale()};
}
  
    public function restaurant_categories()
    {
      return $this->hasMany('App\Models\Restaurant_category');
    }

    public function City(){
  		return $this->belongsTo('App\Models\City');
    }

}
