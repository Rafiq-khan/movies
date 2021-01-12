<h2>Streaming & Videos</h2>
<h6>Control how videos are played and displayed on the site.</h6>

								<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Video Panel Design</label>
	                                    <select name="video_panel_design" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else
	                                       <option value="null">Don't show videos at all</option>
	                                       <option value="carousel" trans="">Carousel</option>
	                                       <option value="table" trans="">Table</option>

	                                        @endif
	                                    </select>
	                                    <small>Which design mode should be used for displaying videos on title and episode pages.</small>
	                                </div>

						<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Video Panel Sorting</label>
	                                    <select name="video_panel_sorting" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else
	                                     <option value="order:asc">Default (Order can be changed via drag and drop)</option>

	                                     <option value="created_at:desc">Date Added</option><option value="name:asc">Name (A-Z)</option>

	                                     <option value="language:asc">Language (A-Z)</option>

	                                     <option value="reports:asc">Reports (Videos with less reports first)</option>

	                                     <option value="score:desc">Score (Most liked videos first)</option>

	                                        @endif
	                                    </select>
	                                    <small>How should videos on title and episode pages be ordered by default.</small>
	                                </div>



									<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Video Panel Content Type</label>
	                                    <select name="video_panel_content_type" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


	                                     <option value="all">All Videos</option>
	                                     <option value="full">Full Movies and Episodes</option>
	                                     <option value="short">Short Videos (Everything Except Full Movies/Episodes)</option>
	                                     <option value="trailer">Trailers</option>
	                                     <option value="clip">Clips</option>

	                                        @endif
	                                    </select>
	                                    <small>What kind of videos should be displayed in videos panel in title and episode pages.</small>
	                                </div>	          



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Captions Panel</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_captions_panel" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Whether "add captions" panel should be shown to regular users when adding/editing videos.</small>
                                </div>


                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Category Select</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_category_select" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Whether "category" select should be shown to regular users when adding/editing videos.</small>
                                </div>



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Header Play Button</label>
                                <label class="switch">
                                  <input type="checkbox" name="header_play_button" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Whether "play" button should be shown on main title header.</small>
                                </div>



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Play Full Movies and Episodes</label>
                                <label class="switch">
                                  <input type="checkbox" name="play_full_movies_episodes" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >When user clicks on "play" buttons across the site play full movie or episode (if available) instead of trailers and clips.</small>
                                </div>



                                 <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Streamable Label</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_streamable_label" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Show "streamable" label on title and episode posters, if they have any streamable videos attached.</small>
                                </div>



	                              


	                                                  


									<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Related Videos Type</label>
	                                    <select name="related_videos_type" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


	                                    <option value="same_title">Other Videos For Same Title</option>
	                                    <option value="other_titles">Videos From Related Titles</option>
	                                    <option value="hide">Hide Related Videos Panel</option>

	                                        @endif
	                                    </select>
	                                    <small>What videos should be displayed in player overlay "related videos" panel.</small>
	                                </div>	  


     						


 								<div class="form-group col-md-12">
                                <label class="col-md-12" >Next Episodes As Related Videos</label>
                                <label class="switch">
                                  <input type="checkbox" name="next_episodes_as_related_videos" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Show next and previous episode videos in player overlay related videos panel, instead of videos related to the whole series.</small>
                                </div>



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Auto Approve Videos</label>
                                <label class="switch">
                                  <input type="checkbox" name="auto_approve_videos" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Automatically approve all videos submitted by users. If disabled, videos submitted by users will have to be manually approved by admin before they are visible.</small>
                                </div>



							 <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Streamable Filter</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_streamable_filter" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Toggle visibility of "Only Streamable" filter on browse titles page.</small>
                                </div>



                                 <div class="form-group col-md-12">
                                <label class="col-md-12" >Toggle Streamable Filter</label>
                                <label class="switch">
                                  <input type="checkbox" name="toggle_streamable_filter" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Set "Only Streamable" filter to "on" by default.</small>
                                </div>



	                                 	                                
