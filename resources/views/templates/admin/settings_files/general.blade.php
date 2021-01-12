
								
								
								<h2>General</h2>
								<h6>Configure general site settings.</h6>

								<div class="row">

									<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Site Url</label>
	                                    <input type="text" name="site_url" required class="form-control" id="exampleInputEmail1" placeholder="Site Url" value="{{isset($add_video)?$add_video->name:''}}">
	                                </div>


	                                 <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Site Homepage</label>
                                    <select name="site_homepage" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                        <option value="adaptive_stream" <?php if($add_video->type=='adaptive_stream') echo "selected"; ?>>Adaptive Stream ( hls ,dash )</option>
                                       


                                        @else
                                        <option value="default" >Default</option>
                                        <option value="application_page"  selected>Application Page</option>
                                        <option value="custom_page" >Custom Page</option>

                                        @endif
                                    </select>
                                    <small>Type of the homepage.</small>
                                </div>



								<div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Default Site Theme</label>
                                    <select name="site_theme" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($add_video))


                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
                                       
                                        @else
                                        <option value="light" >Light</option>
                                        <option value="dark"  selected>Dark</option>

                                        @endif
                                    </select>
                                </div>


                                

                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Allow Theme Change</label>
                                <label class="switch">
                                  <input type="checkbox" name="theme_change" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Allow user to switch from dark to light mode and vice versa.</small>
                                </div>


                                

								</div>
