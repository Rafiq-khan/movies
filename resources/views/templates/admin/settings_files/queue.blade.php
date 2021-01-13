<?php
$queue_method = '';
foreach ($setting as $key => $value) {

 if($value->key_term=='queue_method'){
        $queue_method = $value->value;
    }

}
?>
<h2>Queue</h2>
<h6>Select active queue method and enter related 3rd party API keys.

</h6>

<div class="form-group col-md-12">
	<label for="exampleInputEmail1">Queue Method

	</label>
	<select name="queue_method" required class="form-control" id="exampleInputEmail1">
		@if(isset($add_video))
		<option <?php if($queue_method=='sync') echo "selected"; ?> value="sync">Sync (Default)</option>
		<option <?php if($queue_method=='beanstalkd') echo "selected"; ?> value="beanstalkd">Beanstalkd</option>
		<option <?php if($queue_method=='database') echo "selected"; ?> value="database">Database</option>
		<option <?php if($queue_method=='sqs') echo "selected"; ?> value="sqs">SQS (Amazon simple queue service)</option>
		<option <?php if($queue_method=='redis') echo "selected"; ?> value="redis">Redis</option>

		
		@else
	

		<option value="sync">Sync (Default)</option>
		<option value="beanstalkd">Beanstalkd</option>
		<option value="database">Database</option>
		<option value="sqs">SQS (Amazon simple queue service)</option>
		<option value="redis">Redis</option>

		@endif
	</select>
</div>