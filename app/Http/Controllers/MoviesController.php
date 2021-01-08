<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\MoviesCategories;
use App\Models\MoviesImages;
use App\Models\Categories;
use App\Models\AdminSetting;
use App\Models\SettingForm;
use App\Models\AdminSettingVlaue;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
	public function addmovies()
	{
		$endpoint = "https://api.themoviedb.org/3/discover/movie?api_key=311baf93de3318fed17c97201aa09fdf";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $endpoint);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response  = curl_exec($ch);
		$msg = json_decode($response, true);


		$pages = $msg['total_pages'];

		for ($i = 1; $i <= $pages; $i++) {

			$endpoint = "https://api.themoviedb.org/3/discover/movie?api_key=311baf93de3318fed17c97201aa09fdf&page=" . $i;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $endpoint);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response  = curl_exec($ch);
			$msg = json_decode($response, true);




			$data = $msg['results'];


			foreach ($data as $key => $value) {


				$endpoint_image = "https://api.themoviedb.org/3/movie/" . $value['id'] . "/images?api_key=311baf93de3318fed17c97201aa09fdf";

				$ch_image = curl_init();
				curl_setopt($ch_image, CURLOPT_URL, $endpoint_image);
				curl_setopt($ch_image, CURLOPT_CUSTOMREQUEST, "GET");
				curl_setopt($ch_image, CURLOPT_POST, true);
				curl_setopt($ch_image, CURLOPT_HTTPHEADER, array('Accept: application/json'));
				curl_setopt($ch_image, CURLOPT_RETURNTRANSFER, true);
				$response_image  = curl_exec($ch_image);
				$msg_image = json_decode($response_image, true);




				$chk = Movies::where('movie_id', $value['id'])->first();
				if (empty($chk)) {
					$new = new Movies();
					$new->movie_id = $value['id'];
				} else {
					$new = $chk;
				}

				$new->adult = $value['adult'];
				$new->backdrop_path = $value['backdrop_path'];

				$new->original_language = $value['original_language'];
				$new->original_title = $value['original_title'];
				$new->overview = $value['overview'];

				$new->popularity = $value['popularity'];
				$new->poster_path = $value['poster_path'];
				$new->release_date = isset($value['release_date']) ? $value['release_date'] : date('Y-m-d');
				$new->title = $value['title'];
				$new->video = $value['video'];
				$new->vote_average = $value['vote_average'];
				$new->vote_count = $value['vote_count'];
				$new->save();
				foreach ($value['genre_ids'] as $gen) {
					$cat = Categories::where('genre_id', $gen)->first();

					$cat_chk = MoviesCategories::where('movie_api_id', $value['id'])->where('genre_id', $gen)->first();
					if (empty($cat_chk)) {


						$new_c = new MoviesCategories();
						$new_c->movie_id = $new->id;
						$new_c->movie_api_id = $value['id'];
						$new_c->genre_id = $gen;
						$new_c->category_id = $cat->id;
						$new_c->save();
					}
				}

				for ($m = 0; $m < 1; $m++) {

					if (isset($msg_image['backdrops'][$m])) {


						$bd = $msg_image['backdrops'][$m];

						$link = 'https://image.tmdb.org/t/p/w800/' . $bd['file_path'];
						$chk = MoviesImages::where('movie_api_id', $value['id'])->where('backdrop_image', $link)->first();
						if (empty($chk)) {

							$newimage = new MoviesImages();
							$newimage->movie_id = $new->id;
							$newimage->movie_api_id = $value['id'];
						} else {
							$newimage = $chk;
						}

						$newimage->backdrop_image = $link;
						$newimage->save();
					}
				}
			}
		}
	}





	public function getmovies_list()
	{
		$movies = Movies::orderBy('id', 'desc')->with('movies_genres.movies_genres_name')->paginate(15);
		//	dd($movies[0]);
		return view('templates.admin.movieslist', compact('movies'));
	}
}
