<h2>Localization</h2>
								<h6>Manage localization settings for the site.</h6>
							
							<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Timezone</label>
	                                    <select name="timezone" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


		                                     <option value="all">UTC</option>
	                                        @endif
	                                    </select>
	                                    <small>Choose either a city in the same timezone as you or a UTC timezone offset.</small>
	                                </div>	  


	                                <div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Language</label>
	                                    <select name="language" required class="form-control" id="exampleInputEmail1">
	                                       
		                                     <option value="all">English</option>
	                                    </select>
	                                    <small>Which translation should be selected by default for new users.</small>
	                                </div>	


								<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Date Format</label>
	                                    <select name="date_format" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


											<option value="MMMM d, y" >January 11, 2021 (MMMM d, y)</option>

											<option value="y-M-d" >2021-1-11 (y-M-d)</option>

											<option value="M/d/y" >1/11/2021 (M/d/y)</option>

											<option value="d/M/y" >11/1/2021 (d/M/y)</option>
											<option value="custom" trans="">Custom</option>
	                                        @endif
	                                    </select>
	                                    <small>Default format for dates on the site. <br> Preview: {{date('Y-m-d')}}</small>
	                                </div>	  

	                                <div class="form-group col-md-12">
											<label>
												Custom Date Format


											</label>


											<input type="text" name="custom_date_format" class="form-control">										
											<small>How many items each list on homepage should show.</small>
		                                    
		                                </div>

	   

                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Translations</label>
                                <label class="switch">
                                  <input type="checkbox" name="translation" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Enable translations functionality for the site.</small>
                                </div>