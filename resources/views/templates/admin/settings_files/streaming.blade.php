<?php
$video_panel_design = '';
$video_panel_sorting = '';
$video_panel_content_type = '';
$show_captions_panel = '';
$show_category_select = '';
$header_play_button = '';
$play_full_movies_episodes = '';
$show_streamable_label = '';
$related_videos_type = '';
$next_episodes_as_related_videos = '';
$auto_approve_videos = '';
$show_streamable_filter = '';
$toggle_streamable_filter = '';

foreach ($setting as $key => $value) {

    if($value->key_term=='video_panel_design'){
        $video_panel_design = $value->value;
    }
        if($value->key_term=='video_panel_sorting'){
        $video_panel_sorting = $value->value;
    }
        if($value->key_term=='video_panel_content_type'){
        $video_panel_content_type = $value->value;
    }
        if($value->key_term=='show_captions_panel'){
        $show_captions_panel = $value->value;
    }
        if($value->key_term=='show_category_select'){
        $show_category_select = $value->value;
    }
        if($value->key_term=='header_play_button'){
        $header_play_button = $value->value;
    }
        if($value->key_term=='play_full_movies_episodes'){
        $play_full_movies_episodes = $value->value;
    }
        if($value->key_term=='show_streamable_label'){
        $show_streamable_label = $value->value;
    }
        if($value->key_term=='related_videos_type'){
        $related_videos_type = $value->value;
    }
        if($value->key_term=='next_episodes_as_related_videos'){
        $next_episodes_as_related_videos = $value->value;
    }
        if($value->key_term=='auto_approve_videos'){
        $auto_approve_videos = $value->value;
    }
        if($value->key_term=='show_streamable_filter'){
        $show_streamable_filter = $value->value;
    }
        if($value->key_term=='toggle_streamable_filter'){
        $toggle_streamable_filter = $value->value;
    }
        
}
?>

<h2>Streaming & Videos</h2>
<h6>Control how videos are played and displayed on the site.</h6>

								<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Video Panel Design</label>
	                                    <select name="video_panel_design" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($setting))


	                                         <option value="null" <?php if($video_panel_design=='null') echo "selected"; ?> >Don't show videos at all</option>
                                         <option value="carousel" <?php if($video_panel_design=='carousel') echo "selected"; ?>  trans="">Carousel</option>
                                         <option value="table" <?php if($video_panel_design=='table') echo "selected"; ?>  trans="">Table</option>
	                                       
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
	                                        @if(isset($setting))


	                                         <option <?php if($video_panel_sorting=='order:asc') echo "selected"; ?> value="order:asc">Default (Order can be changed via drag and drop)</option>

                                       <option <?php if($video_panel_sorting=='created_at:desc') echo "selected"; ?> value="created_at:desc">Date Added</option><option value="name:asc">Name (A-Z)</option>

                                       <option <?php if($video_panel_sorting=='language:asc') echo "selected"; ?> value="language:asc">Language (A-Z)</option>

                                       <option <?php if($video_panel_sorting=='reports:asc') echo "selected"; ?> value="reports:asc">Reports (Videos with less reports first)</option>

                                       <option <?php if($video_panel_sorting=='score:desc') echo "selected"; ?> value="score:desc">Score (Most liked videos first)</option>


	                                       
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
	                                        @if(isset($setting))


	                                        <option value="all">All Videos</option>
                                       <option value="full">Full Movies and Episodes</option>
                                       <option value="short">Short Videos (Everything Except Full Movies/Episodes)</option>
                                       <option value="trailer">Trailers</option>
                                       <option value="clip">Clips</option>
	                                       
	                                        @else


	                                     <option <?php if($video_panel_sorting=='all') echo "selected"; ?> value="all">All Videos</option>
	                                     <option <?php if($video_panel_sorting=='full') echo "selected"; ?> value="full">Full Movies and Episodes</option>
	                                     <option <?php if($video_panel_sorting=='short') echo "selected"; ?> value="short">Short Videos (Everything Except Full Movies/Episodes)</option>
	                                     <option <?php if($video_panel_sorting=='trailer') echo "selected"; ?> value="trailer">Trailers</option>
	                                     <option <?php if($video_panel_sorting=='clip') echo "selected"; ?> value="clip">Clips</option>

	                                        @endif
	                                    </select>
	                                    <small>What kind of videos should be displayed in videos panel in title and episode pages.</small>
	                                </div>	          



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Captions Panel</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_captions_panel" <?php if($show_captions_panel=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Whether "add captions" panel should be shown to regular users when adding/editing videos.</small>
                                </div>


                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Category Select</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_category_select" <?php if($show_category_select=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Whether "category" select should be shown to regular users when adding/editing videos.</small>
                                </div>



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Header Play Button</label>
                                <label class="switch">
                                  <input type="checkbox" name="header_play_button" <?php if($header_play_button=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Whether "play" button should be shown on main title header.</small>
                                </div>



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Play Full Movies and Episodes</label>
                                <label class="switch">
                                  <input type="checkbox" name="play_full_movies_episodes" <?php if($play_full_movies_episodes=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >When user clicks on "play" buttons across the site play full movie or episode (if available) instead of trailers and clips.</small>
                                </div>



                                 <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Streamable Label</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_streamable_label" <?php if($show_streamable_label=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Show "streamable" label on title and episode posters, if they have any streamable videos attached.</small>
                                </div>



	                              


	                                                  


									<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Related Videos Type</label>
	                                    <select name="related_videos_type" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($setting))


	                                       <option <?php if($related_videos_type=='same_title') echo "selected"; ?> value="same_title">Other Videos For Same Title</option>
                                      <option <?php if($related_videos_type=='other_titles') echo "selected"; ?> value="other_titles">Videos From Related Titles</option>
                                      <option <?php if($related_videos_type=='hide') echo "selected"; ?> value="hide">Hide Related Videos Panel</option>
	                                       
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
                                  <input type="checkbox" name="next_episodes_as_related_videos" <?php if($next_episodes_as_related_videos=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Show next and previous episode videos in player overlay related videos panel, instead of videos related to the whole series.</small>
                                </div>



                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Auto Approve Videos</label>
                                <label class="switch">
                                  <input type="checkbox" name="auto_approve_videos" <?php if($auto_approve_videos=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Automatically approve all videos submitted by users. If disabled, videos submitted by users will have to be manually approved by admin before they are visible.</small>
                                </div>



							 <div class="form-group col-md-12">
                                <label class="col-md-12" >Show Streamable Filter</label>
                                <label class="switch">
                                  <input type="checkbox" name="show_streamable_filter" <?php if($show_streamable_filter=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Toggle visibility of "Only Streamable" filter on browse titles page.</small>
                                </div>



                                 <div class="form-group col-md-12">
                                <label class="col-md-12" >Toggle Streamable Filter</label>
                                <label class="switch">
                                  <input type="checkbox" name="toggle_streamable_filter" <?php if($toggle_streamable_filter=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Set "Only Streamable" filter to "on" by default.</small>
                                </div>



	                                 	                                
