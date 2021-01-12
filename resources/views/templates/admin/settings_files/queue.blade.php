<h2>Queue</h2>
<h6>Select active queue method and enter related 3rd party API keys.

</h6>

<div class="form-group col-md-12">
	<label for="exampleInputEmail1">Queue Method

	</label>
	<select name="queue_method" required class="form-control" id="exampleInputEmail1">
		@if(isset($add_video))
		<option value="embed"> <?php if($add_video->type=='embed') echo "selected"; ?>Embed</option>
		<option value="direct_video" <?php if($add_video->type=='direct_video') echo "selected"; ?>>Direct Video ( .mp4, .webm, .avi, .mov etc.)</option>
		
		@else
	

		<option value="sync">Sync (Default)</option>
		<option value="beanstalkd">Beanstalkd</option>
		<option value="database">Database</option>
		<option value="sqs">SQS (Amazon simple queue service)</option>
		<option value="redis">Redis</option>

		@endif
	</select>
</div>