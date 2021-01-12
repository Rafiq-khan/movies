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
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
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
                                  <input type="checkbox" name="theme_change" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Enable or disable all review functionality across the site.</small>
                                </div>
	                                <hr>


	                                <div class="form-group col-md-12 form-group-float">
	                                 	<label for="exampleInputEmail1">Browse Page Genres</label>
									<input type="text" class="form-control tags-input" name="page_genres" value="Romance,Mystery" placeholder="- Bootstrap tags input" data-fouc>
									</div>


									<div class="form-group col-md-12 form-group-float">
		                                 	<label for="exampleInputEmail1">Age Ratings</label>
										<input type="text" class="form-control tags-input" name="age_ratings"   value="Romance,Mystery" placeholder="- Bootstrap tags input" data-fouc>
									</div>


									<div class="form-group col-md-12 form-group-float">
		                                 	<label for="exampleInputEmail1">Possible Video Qualities</label>
										<input type="text" class="form-control tags-input" name="video_quality" value="Romance,Mystery" placeholder="- Bootstrap tags input" data-fouc>
									</div>

									<div class="row">
										<div class="form-group col-md-6">
											<label>
												Browse Min Year
											</label>


											<input type="number" name="min_year" value="1880" class="form-control">										
											<small>Minimum and maximum years for slider in browse titles page.</small>
		                                    
		                                </div>


		                                <div class="form-group col-md-6">

											<label>
												Browse Max Year
											</label>


											<input type="number" name="max_year" value="2023" class="form-control">											                                    
		                                </div>
	                            	</div>
 

	                            	<div class="form-group col-md-12">
											<label>
												People Page Min Popularity
											</label>


											<input type="number" name="people_page_popularity" value="1" class="form-control">										
											<small>Only people with specified or higher popularity will be shown on people page. Enter zero to show all people.</small>
		                                    
		                                </div>




									</div>

									<div class="tab-pane fade" id="automation_pill">
										

									


                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Auto Update News</label>
                                <label class="switch">
                                  <input type="checkbox" name="auto_update" checked>
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
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                       


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
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                       


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
                                  <input type="checkbox" name="always_update_seasons" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >When this is enabled, season episodes will be automatically updated, even if automation is disabled.</small>
                                </div>

                                



	                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">People Data Provider</label>
                                    <select name="people_data_provider" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                       


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
		                                  <input type="checkbox" name="auto_update_filmography" checked>
		                                  <span class="slider round"></span>
		                                </label>
		                                <div class="clearfix"></div>
		                                 <small class="col-md-12" >Whether person filmography should be auto updated when person data provider is set to TMDb.</small>
		                                </div>



		                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">List Data Provider</label>
                                    <select name="list_data_provider" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                       


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
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                       


                                        @else
                                        <option value="english" >English</option>

                                        @endif
                                    </select>
                                    <small>In what language should content be fetched from TMDb. If translation is not available data will default to english.</small>
                                </div>


                                		


		                                <div class="form-group col-md-12">
		                                <label class="col-md-12" >Allow Adult Content</label>
		                                <label class="switch">
		                                  <input type="checkbox" name="allow_adult_content" checked>
		                                  <span class="slider round"></span>
		                                </label>
		                                <div class="clearfix"></div>
		                                 
		                                </div>



									</div>

									<div class="tab-pane fade" id="homepage_pill">
										
									

		                                <div class="form-group col-md-12">
		                                <label class="col-md-12" >Auto Slide Homepage Slider</label>
		                                <label class="switch">
		                                  <input type="checkbox" name="auto_slider_homepage" checked>
		                                  <span class="slider round"></span>
		                                </label>
		                                <div class="clearfix"></div>
		                                <small>Toggle auto-slide functionality of homepage slider.</small>
		                                 
		                                </div>



		                                <div class="form-group col-md-12">
											<label>
												Homepage List Items

											</label>


											<input type="number" name="homepage_list_items" class="form-control">										
											<small>How many items each list on homepage should show.</small>
		                                    
		                                </div>

		                                <div class="form-group col-md-12">
											<label>
												Homepage Slider Items

											</label>


											<input type="number" name="homepage_slider_items" class="form-control">										
											<small>How many items homepage slider should show.</small>
		                                    
		                                </div>

		                              

		                                 <div class="form-group col-md-12">
		                                <label class="col-md-12" >Show Play Buttons</label>
		                                <label class="switch">
		                                  <input type="checkbox" name="show_play_buttons" checked>
		                                  <span class="slider round"></span>
		                                </label>
		                                <div class="clearfix"></div>
		                                <small>Show "play" buttons on all title posters on homepage.</small>
		                                 
		                                </div>


									</div>

									
									
								</div>
							</div>