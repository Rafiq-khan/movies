<?php
$rating_used_for_sorting = '';
$enable_reviews = '';
$page_genres = '';
$age_ratings = '';
$video_quality = '';
$min_year = '';
$max_year = '';
$people_page_popularity = '';
$auto_update = '';
$search_method = '';
$title_data_provider = '';
$always_update_seasons = '';
$people_data_provider = '';
$auto_update_filmography = '';
$list_data_provider = '';
$tmdb_api_key = '';
$tmdb_language = '';
$allow_adult_content = '';
$auto_slider_homepage = '';
$homepage_list_items = '';
$homepage_slider_items = '';
$show_play_buttons = '';

foreach ($setting as $key => $value) {

    if($value->key_term=='rating_used_for_sorting'){
        $rating_used_for_sorting = $value->value;
    }
        if($value->key_term=='enable_reviews'){
        $enable_reviews = $value->value;
    }
        if($value->key_term=='page_genres'){
        $page_genres = $value->value;
    }
        if($value->key_term=='age_ratings'){
        $age_ratings = $value->value;
    }
        if($value->key_term=='video_quality'){
        $video_quality = $value->value;
    }
        if($value->key_term=='min_year'){
        $min_year = $value->value;
    }
        if($value->key_term=='max_year'){
        $max_year = $value->value;
    }
        if($value->key_term=='people_page_popularity'){
        $people_page_popularity = $value->value;
    }
        if($value->key_term=='auto_update'){
        $auto_update = $value->value;
    }
        if($value->key_term=='search_method'){
        $search_method = $value->value;
    }
        if($value->key_term=='title_data_provider'){
        $title_data_provider = $value->value;
    }
        if($value->key_term=='always_update_seasons'){
        $always_update_seasons = $value->value;
    }
        if($value->key_term=='people_data_provider'){
        $people_data_provider = $value->value;
    }
        if($value->key_term=='auto_update_filmography'){
        $auto_update_filmography = $value->value;
    }
        if($value->key_term=='list_data_provider'){
        $list_data_provider = $value->value;
    }
        if($value->key_term=='tmdb_api_key'){
        $tmdb_api_key = $value->value;
    }
        if($value->key_term=='tmdb_language'){
        $tmdb_language = $value->value;
    }
        if($value->key_term=='allow_adult_content'){
        $allow_adult_content = $value->value;
    }
        if($value->key_term=='auto_slider_homepage'){
        $auto_slider_homepage = $value->value;
    }
        if($value->key_term=='homepage_list_items'){
        $homepage_list_items = $value->value;
    }
        if($value->key_term=='homepage_slider_items'){
        $homepage_slider_items = $value->value;
    }
        if($value->key_term=='show_play_buttons'){
        $show_play_buttons = $value->value;
    }

}
?>



<h2>Content</h2>
<h6>Control how content is displayed across the site.</h6>
<div class="card-body">
	<ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar nav-justified">
		
		<li class="nav-item"><a href="#general_pill" class="nav-link rounded-left-round active" data-toggle="tab">General</a></li>
		<li class="nav-item"><a href="#automation_pill" class="nav-link" data-toggle="tab">Automation</a></li>
		<li class="nav-item"><a href="#homepage_pill" class="nav-link rounded-right-round" data-toggle="tab">Homepage</a></li>
		
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade show active" id="general_pill">
			
			<div class="form-group col-md-12">
				<label for="exampleInputEmail1">Rating Used For Sorting</label>
				<select name="rating_used_for_sorting" required class="form-control" id="exampleInputEmail1">
					@if(isset($setting))
					<option value="themoviedb" <?php if($rating_used_for_sorting=='themoviedb') echo "selected"; ?>>?TheMovieDB</option>
					<option value="local" <?php if($rating_used_for_sorting=='local') echo "selected"; ?>>Local (Ratings and reviews from site users)</option>
					
					@else
					<option value="themoviedb" >TheMovieDB</option>
					<option value="local">Local (Ratings and reviews from site users)</option>
					@endif
				</select>
				<small>When ordering titles by rating, should local user rating or TheMovieDB rating average be used.</small>
			</div>
			
			
			<div class="form-group col-md-12">
				<label class="col-md-12" >Enable Reviews</label>
				<label class="switch">
					<input type="checkbox" name="enable_reviews" <?php if($enable_reviews=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				<small class="col-md-12" >Enable or disable all review functionality across the site.</small>
			</div>
			<hr>
			<div class="form-group col-md-12 form-group-float">
				<label for="exampleInputEmail1">Browse Page Genres</label>
				<input type="text" class="form-control tags-input" name="page_genres" value="{{$page_genres}}" placeholder="- Bootstrap tags input" data-fouc>
			</div>
			<div class="form-group col-md-12 form-group-float">
				<label for="exampleInputEmail1">Age Ratings</label>
				<input type="text" class="form-control tags-input" name="age_ratings"   value="{{$age_ratings}}" placeholder="- Bootstrap tags input" data-fouc>
			</div>
			<div class="form-group col-md-12 form-group-float">
				<label for="exampleInputEmail1">Possible Video Qualities</label>
				<input type="text" class="form-control tags-input" name="video_quality" value="{{$video_quality}}" placeholder="- Bootstrap tags input" data-fouc>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>
						Browse Min Year
					</label>
					<input type="number" name="min_year" value="{{$min_year}}" class="form-control">
					<small>Minimum and maximum years for slider in browse titles page.</small>
					
				</div>
				<div class="form-group col-md-6">
					<label>
						Browse Max Year
					</label>
					<input type="number" name="max_year" value="{{$max_year}}" class="form-control">
				</div>
			</div>
			
			<div class="form-group col-md-12">
				<label>
					People Page Min Popularity
				</label>
				<input type="number" name="people_page_popularity" value="{{$people_page_popularity}}" class="form-control">
				<small>Only people with specified or higher popularity will be shown on people page. Enter zero to show all people.</small>
				
			</div>
		</div>
		<div class="tab-pane fade" id="automation_pill">
			
			
			<div class="form-group col-md-12">
				<label class="col-md-12" >Auto Update News</label>
				<label class="switch">
					<input type="checkbox" name="auto_update" <?php if($auto_update=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				<small class="col-md-12" >When enabled, news will be automatically updated using 3rd party sites.</small>
			</div>
			<div class="form-group col-md-12">
				<button class="btn btn-danger" type="button">Update News Now</button>
			</div>
			<hr>
			<div class="form-group col-md-12">
				<label for="exampleInputEmail1">Search Method</label>
				<select name="search_method" required class="form-control" id="exampleInputEmail1">
					@if(isset($setting))
					<option value="tmdb" <?php if($search_method=='tmdb') echo "selected"; ?>>The Movie Database (TMDb)</option>
					<option value="local" <?php if($search_method=='local') echo "selected"; ?>>Local Database</option>
					<option value="all" <?php if($search_method=='all') echo "selected"; ?>>TMDb + Local Database</option>
					
					@else
					<option value="tmdb" >The Movie Database (TMDb)</option>
					<option value="local">Local Database</option>
					<option value="all" >TMDb + Local Database</option>
					@endif
				</select>
				<small>Which method should be used for performing search across the site.</small>
			</div>
			<div class="form-group col-md-12">
				<label for="exampleInputEmail1">Title Data Provider</label>
				<select name="title_data_provider" required class="form-control" id="exampleInputEmail1">
					@if(isset($setting))
					<option value="tmdb" <?php if($title_data_provider=='tmdb') echo "selected"; ?> >The Movie Database (TMDb)</option>
					<option value="local" <?php if($title_data_provider=='local') echo "selected"; ?>>Local Database</option>
					
					@else
					<option value="tmdb" >The Movie Database (TMDb)</option>
					<option value="local">Local Database</option>
					@endif
				</select>
				<small>Which method should be used for retrieving data about movies and TV series.</small>
			</div>
			<div class="form-group col-md-12">
				<label class="col-md-12" >Always Update Seasons</label>
				<label class="switch">
					<input type="checkbox" name="always_update_seasons" <?php if($always_update_seasons=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				<small class="col-md-12" >When this is enabled, season episodes will be automatically updated, even if automation is disabled.</small>
			</div>
			
			<div class="form-group col-md-12">
				<label for="exampleInputEmail1">People Data Provider</label>
				<select name="people_data_provider" required class="form-control" id="exampleInputEmail1">
					@if(isset($setting))
					<option value="tmdb"  <?php if($title_data_provider=='tmdb') echo "selected"; ?>>The Movie Database (TMDb)</option>
					<option value="local" <?php if($title_data_provider=='local') echo "selected"; ?>>Local Database</option>
					
					@else
					<option value="tmdb" >The Movie Database (TMDb)</option>
					<option value="local">Local Database</option>
					@endif
				</select>
				<small>Which method should be used for retrieving data about people (biography, filmography, statistics etc.)</small>
			</div>
			<div class="form-group col-md-12">
				<label class="col-md-12" >Auto Update Filmography</label>
				<label class="switch">
					<input type="checkbox" name="auto_update_filmography" <?php if($auto_update_filmography=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				<small class="col-md-12" >Whether person filmography should be auto updated when person data provider is set to TMDb.</small>
			</div>
			<div class="form-group col-md-12">
				<label for="exampleInputEmail1">List Data Provider</label>
				<select name="list_data_provider" required class="form-control" id="exampleInputEmail1">
					@if(isset($setting))
					<option value="tmdb"  <?php if($list_data_provider=='tmdb') echo "selected"; ?>>The Movie Database (TMDb)</option>
					<option value="local" <?php if($list_data_provider=='local') echo "selected"; ?>>Local Database</option>
					
					@else
					<option value="tmdb" >The Movie Database (TMDb)</option>
					<option value="local">Local Database</option>
					@endif
				</select>
				<small>Which method should be used for auto updating lists. Note that some list auto update methods (like last added titles) will use local provider regardless of what is set here.</small>
			</div>
			<div class="form-group col-md-12">
				<button class="btn btn-danger" type="button">Update Lists Now</button>
			</div>
			<hr>
			<div class="form-group col-md-12">
				<span class="badge badge-light badge-striped badge-striped-left border-left-success" style="text-align: left;font-size: 14px;">
					
					<strong>Information</strong><br>
					TMDb method will automatically query themoviedb for <br>relevant data and import it into local database. Local <br> method will retrieve data from local site database (this<br> includes data that was previously cached locally by any <br>import methods as well as data created manually via <br>admin area).
				</span>
			</div>
			<div class="form-group col-md-12">
				<label>
					TMDB API Key
				</label>
				<input type="text" name="tmdb_api_key" class="form-control">
				
			</div>
			<div class="form-group col-md-12">
				<label for="exampleInputEmail1">TMDB Language</label>
				<select required class="form-control" name="tmdb_language" id="exampleInputEmail1">
					@if(isset($setting))
					<option value="english" selected >English</option>
					
					@else
					<option value="english" >English</option>
					@endif
				</select>
				<small>In what language should content be fetched from TMDb. If translation is not available data will default to english.</small>
			</div>
			
			<div class="form-group col-md-12">
				<label class="col-md-12" >Allow Adult Content</label>
				<label class="switch">
					<input type="checkbox" name="allow_adult_content" <?php if($allow_adult_content=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				
			</div>
		</div>
		<div class="tab-pane fade" id="homepage_pill">
			
			
			<div class="form-group col-md-12">
				<label class="col-md-12" >Auto Slide Homepage Slider</label>
				<label class="switch">
					<input type="checkbox" name="auto_slider_homepage" <?php if($auto_slider_homepage=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				<small>Toggle auto-slide functionality of homepage slider.</small>
				
			</div>
			<div class="form-group col-md-12">
				<label>
					Homepage List Items
				</label>
				<input type="number" name="homepage_list_items" value="{{$homepage_list_items}}" class="form-control">
				<small>How many items each list on homepage should show.</small>
				
			</div>
			<div class="form-group col-md-12">
				<label>
					Homepage Slider Items
				</label>
				<input type="number" name="homepage_slider_items" value="{{$homepage_slider_items}}" class="form-control">
				<small>How many items homepage slider should show.</small>
				
			</div>
			
			<div class="form-group col-md-12">
				<label class="col-md-12" >Show Play Buttons</label>
				<label class="switch">
					<input type="checkbox" name="show_play_buttons" <?php if($show_play_buttons=='yes') echo "checked" ?>>
					<span class="slider round"></span>
				</label>
				<div class="clearfix"></div>
				<small>Show "play" buttons on all title posters on homepage.</small>
				
			</div>
		</div>
		
		
	</div>
</div>