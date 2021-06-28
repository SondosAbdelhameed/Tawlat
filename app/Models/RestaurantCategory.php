<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_category extends Model
{
    protected $fillable = ['id', 'restaurant_id','category_id'];
    protected $table = "restaurant_categories";
}
