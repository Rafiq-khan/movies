<h2>User Uploads</h2>
								<h6>Configure size and type of files that users are able to upload. This will affect all uploads across the site.</h6>


 							<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Public Uploads Storage Method</label>
	                                    <select name="public_uploads_storage_method" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


											<option value="local">Local Disk (Default)</option>
											<option value="s3">Amazon S3</option>
											<option value="digitalocean">DigitalOcean</option>

											<option value="backblaze">Backblaze</option>
	                                        @endif
	                                    </select>
	                                    <small>Where site uploads (video, subtitles, avatars etc.) should be stored.</small>
	                                </div>


	                                <div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">File Delivery Optimization</label>
	                                    <select name="file_delivery_optimization" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


											<option value="null">None</option>

											<option value="xsendfile">X-Sendfile (Apache)</option>

											<option value="xaccel">X-Accel (Nginx)</option>
	                                        @endif

	                                        </select>

	                                    <small>Both X-Sendfile and X-Accel need to be enabled on the server first. When enabled it will reduce server memory and CPU usage when previewing or downloading files, especially for large files.</small>
	                                </div>
 

	                                <hr>
                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Chunked Uploads</label>
                                <label class="switch">
                                  <input type="checkbox" name="chunked_upload" checked>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >When enabled larger files will be uploaded in smaller chunks to improve upload reliability and avoid server max upload size limits.</small>
                                </div>


                                 <div class="form-group col-md-12">

	                                	<span class="badge badge-light badge-striped badge-striped-left border-left-warning" style="text-align: left;font-size: 14px;">
	                                			
	                                		<strong>Important</strong><br>
											Maximum upload size on your server currently is set to <strong>2M</strong>.	

	                                	</span>

	                                </div>

	                                <div class="row">

	                                <div class="form-group col-md-9">
											<label>
												Maximum file size


											</label>


											<input type="number" name="maximum_file_size" class="form-control">										
											<small>Maximum size for a single file user can upload.</small>
		                                    
		                                </div>	

	                                <div class="form-group col-md-3">
	                                    <label for="exampleInputEmail1">Select</label>
	                                    <select name="maximum_file_type" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


											<option value="bytes">bytes</option>
											<option value="KB">KB</option>
											<option value="MB">MB</option>
											<option value="GB">GB</option>
											<option value="TB">TB</option>
											<option value="PB">PB</option>
	                                        @endif
	                                    </select>
	                                    
	                                </div>
	                            	</div>





								<div class="row">

	                                <div class="form-group col-md-9">
											<label>
												Available Space
											</label>


											<input type="number" name="available_space" class="form-control">										
											<small>Disk space each user uploads are allowed to take up. This can be overridden per user.</small>

		                                    
		                                </div>	

	                                <div class="form-group col-md-3">
	                                    <label for="exampleInputEmail1">Select</label>
	                                    <select name="available_space_type" required class="form-control" id="exampleInputEmail1">
	                                        @if(isset($add_video))


	                                        <option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
	                                        <option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
	                                       
	                                        @else


											<option value="bytes">bytes</option>
											<option value="KB">KB</option>
											<option value="MB">MB</option>
											<option value="GB">GB</option>
											<option value="TB">TB</option>
											<option value="PB">PB</option>
	                                        @endif
	                                    </select>
	                                </div>
	                            	</div>




									<div class="form-group col-md-12">
											<label>
												Allowed file types
											</label>


											<input type="text" name="allowed_file_types" class="form-control">										
											<small>List of allowed file types (jpg, mp3, pdf etc.). Leave empty to allow all file types.</small>

		                                    
		                                </div>	

									<div class="form-group col-md-12 form-group-float">
		                                 	<label for="exampleInputEmail1">Blocked file types</label>
										<input type="text" name="blocked_file_types" class="form-control tags-input" value="exe" placeholder="- Bootstrap tags input" data-fouc>
									</div>
