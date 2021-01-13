<?php
$google_service_account = '';
$google_analytics_view = '';
$google_analytics_tracking = '';


foreach ($setting as $key => $value) {

 if($value->key_term=='google_service_account'){
        $google_service_account = $value->value;
    }

    if($value->key_term=='google_analytics_view'){
        $google_analytics_view = $value->value;
    }

    if($value->key_term=='google_analytics_tracking'){
        $google_analytics_tracking = $value->value;
    }


}
?>


<h2>Analytics</h2>
<h6>Configure google analytics integration and credentials.
</h6>
<div class="form-group col-md-12">
	<label>
		Google Service Account Key File (.json)
	</label>
	<input type="file" name="google_service_account" class="form-control">
</div>
<div class="form-group col-md-12">
	<label>
		Google Analytics View ID
	</label>
	<input type="text" name="google_analytics_view" value="{{$google_analytics_view}}" class="form-control">
</div>
<div class="form-group col-md-12">
	<label>
		Google Analytics Tracking Code
	</label>
	<input type="text" name="google_analytics_tracking"value="{{$google_analytics_tracking}}"  class="form-control">
	<small>Google analytics tracking code only, not the whole javascript code snippet.</small>
</div>