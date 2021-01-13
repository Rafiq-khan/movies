<?php
$cache_method = '';
foreach ($setting as $key => $value) {

 if($value->key_term=='cache_method'){
        $cache_method = $value->value;
    }

}
?>
<h2>Cache</h2>
<h6>Configure cache time, method and related 3rd party integrations.</h6>
<div class="form-group col-md-12">
	<label for="exampleInputEmail1">Cache Method
	</label>
	<select name="cache_method" required class="form-control" id="exampleInputEmail1">
		@if(isset($setting))
		<option <?php if($cache_method=='file') echo "selected"; ?> value="file">File (Default)</option>
		<option <?php if($cache_method=='array') echo "selected"; ?> value="array">None</option>
		<option <?php if($cache_method=='apc') echo "selected"; ?> value="apc">APC</option>
		<option <?php if($cache_method=='memcached') echo "selected"; ?> value="memcached">Memcached</option>
		<option <?php if($cache_method=='redis') echo "selected"; ?> value="redis">Redis</option>
		
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