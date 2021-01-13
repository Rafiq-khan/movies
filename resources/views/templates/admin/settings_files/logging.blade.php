<?php
$sentry_dsn = '';
foreach ($setting as $key => $value) {

 if($value->key_term=='sentry_dsn'){
        $sentry_dsn = $value->value;
    }

}
?>
<h2>Logging</h2>
<h6>Configure site error and access logging and related 3rd party integrations.
</h6>


<div class="form-group col-md-12">
	<label>
		Sentry DSN
	</label>
	<input type="text" name="sentry_dsn" value="{{$sentry_dsn}}" class="form-control">	
</div>
