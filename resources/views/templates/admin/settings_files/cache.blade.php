<h2>Cache</h2>
<h6>Configure cache time, method and related 3rd party integrations.</h6>
<div class="form-group col-md-12">
	<label for="exampleInputEmail1">Cache Method
	</label>
	<select name="cache_method" required class="form-control" id="exampleInputEmail1">
		@if(isset($add_video))
		<option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
		<option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
		
		@else
		<option value="file">File (Default)</option>
		<option value="array">None</option>
		<option value="apc">APC</option>
		<option value="memcached">Memcached</option>
		<option value="redis">Redis</option>
		@endif
	</select>
	<small>Which method should be used for storing and retrieving cached items.
	</small>
</div>



<div class="form-group col-md-12">
	<a href="#" class="btn btn-danger">Clear Cache</a>
</div>


 <div class="form-group col-md-12">

	                                	<span class="badge badge-light badge-striped badge-striped-left border-left-warning" style="text-align: left;font-size: 14px;">
	                                			
	                                		<strong>Important</strong><br>
											"File" is the best option for most cases and should not be changed, unless you are familiar with another cache method and have it set up on the server already.	

	                                	</span>

	                                </div>