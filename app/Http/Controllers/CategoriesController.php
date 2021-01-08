<?php

namespace App\Http\Controllers;
use App\Models\Categories;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
   public function add_apicategories(){
   	$endpoint = "https://api.themoviedb.org/3/genre/movie/list?api_key=311baf93de3318fed17c97201aa09fdf&language=en-US";



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept: application/json') );


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response  = curl_exec($ch);

        $msg = json_decode($response,true);

       $data=$msg['genres'];
   foreach ($data as $key => $value) {

   		$new=new Categories();
   		$new->name=$value['name'];
   		$new->genre_id=$value['id'];
   		$new->save();
   }


   }
}
