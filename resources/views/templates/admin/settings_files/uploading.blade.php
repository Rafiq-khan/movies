<?php


$public_uploads_storage_method = '';
$file_delivery_optimization = '';
$chunked_upload = '';
$maximum_file_size = '';
$maximum_file_type = '';
$available_space = '';
$available_space_type = '';
$allowed_file_types = '';
$blocked_file_types = '';


foreach ($setting as $key => $value) {

 if($value->key_term=='public_uploads_storage_method'){
        $public_uploads_storage_method = $value->value;
    }

    if($value->key_term=='file_delivery_optimization'){
        $file_delivery_optimization = $value->value;
    }

        if($value->key_term=='chunked_upload'){
        $chunked_upload = $value->value;
    }

        if($value->key_term=='maximum_file_size'){
        $maximum_file_size = $value->value;
    }

        if($value->key_term=='maximum_file_type'){
        $maximum_file_type = $value->value;
    }

        if($value->key_term=='available_space'){
        $available_space = $value->value;
    }

        if($value->key_term=='available_space_type'){
        $available_space_type = $value->value;
    }

        if($value->key_term=='allowed_file_types'){
        $allowed_file_types = $value->value;
    }

        if($value->key_term=='blocked_file_types'){
        $blocked_file_types = $value->value;
    }
        
}
?>

<h2>User Uploads</h2>
<h6>Configure size and type of files that users are able to upload. This will affect all uploads across the site.</h6>
<div class="form-group col-md-12">
	<label for="exampleInputEmail1">Public Uploads Storage Method</label>
	<select name="public_uploads_storage_method" required class="form-control" id="exampleInputEmail1">
		@if(isset($setting))
		<option <?php if($public_uploads_storage_method=='local') echo "selected"; ?> value="local">Local Disk (Default)</option>
		<option <?php if($public_uploads_storage_method=='s3') echo "selected"; ?> value="s3">Amazon S3</option>
		<option <?php if($public_uploads_storage_method=='digitalocean') echo "selected"; ?> value="digitalocean">DigitalOcean</option>
		<option <?php if($public_uploads_storage_method=='backblaze') echo "selected"; ?> value="backblaze">Backblaze</option>
		
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
		@if(isset($setting))
		<option <?php if($file_delivery_optimization=='null') echo "selected"; ?>  value="null">None</option>
		<option <?php if($file_delivery_optimization=='xsendfile') echo "selected"; ?>  value="xsendfile">X-Sendfile (Apache)</option>
		<option <?php if($file_delivery_optimization=='xaccel') echo "selected"; ?>  value="xaccel">X-Accel (Nginx)</option>
		
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
		<input type="checkbox" name="chunked_upload" <?php if($chunked_upload=='yes') echo "checked" ?>>
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
		<input type="number" name="maximum_file_size" value="{{$maximum_file_size}}" class="form-control">
		<small>Maximum size for a single file user can upload.</small>
		
	</div>
	<div class="form-group col-md-3">
		<label for="exampleInputEmail1">Select</label>
		<select name="maximum_file_type" required class="form-control" id="exampleInputEmail1">
			@if(isset($setting))
			<option <?php if($maximum_file_type=='bytes') echo "selected"; ?> value="bytes">bytes</option>
			<option <?php if($maximum_file_type=='KB') echo "selected"; ?> value="KB">KB</option>
			<option <?php if($maximum_file_type=='MB') echo "selected"; ?> value="MB">MB</option>
			<option <?php if($maximum_file_type=='GB') echo "selected"; ?> value="GB">GB</option>
			<option <?php if($maximum_file_type=='TB') echo "selected"; ?> value="TB">TB</option>
			<option <?php if($maximum_file_type=='PB') echo "selected"; ?> value="PB">PB</option>
			
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
		<input type="number" name="available_space" value="{{$available_space}}" class="form-control">
		<small>Disk space each user uploads are allowed to take up. This can be overridden per user.</small>
		
	</div>
	<div class="form-group col-md-3">
		<label for="exampleInputEmail1">Select</label>
		<select name="available_space_type" required class="form-control" id="exampleInputEmail1">
			@if(isset($setting))
			<option <?php if($available_space_type=='bytes') echo "selected"; ?> value="bytes">bytes</option>
			<option <?php if($available_space_type=='KB') echo "selected"; ?> value="KB">KB</option>
			<option <?php if($available_space_type=='MB') echo "selected"; ?> value="MB">MB</option>
			<option <?php if($available_space_type=='GB') echo "selected"; ?> value="GB">GB</option>
			<option <?php if($available_space_type=='TB') echo "selected"; ?> value="TB">TB</option>
			<option <?php if($available_space_type=='PB') echo "selected"; ?> value="PB">PB</option>
			
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
	<input type="text" name="allowed_file_types" value="{{$allowed_file_types}}" class="form-control">
	<small>List of allowed file types (jpg, mp3, pdf etc.). Leave empty to allow all file types.</small>
	
</div>
<div class="form-group col-md-12 form-group-float">
	<label for="exampleInputEmail1">Blocked file types</label>
	<input type="text" name="blocked_file_types" class="form-control tags-input" value="{{$blocked_file_types}}" placeholder="- Bootstrap tags input" data-fouc>
</div>