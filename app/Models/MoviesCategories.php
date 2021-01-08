<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviesCategories extends Model
{
   protected $table='movie_categories';
   public function movies_genres_name(){
    	return $this->hasOne('App\Models\Categories','id','category_id');
    }
}
