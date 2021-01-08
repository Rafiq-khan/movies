<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table='movies';
    public function movies_genres(){
    	return $this->hasMany('App\Models\MoviesCategories','movie_id','id');
    }
    public function movies_images(){
    	return $this->hasMany('App\Models\MoviesImages','movie_id','id');
    }
}
