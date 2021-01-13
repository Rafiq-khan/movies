<?php
$require_email_confirmation = '';
$disable_registration = '';
$single_device_login = '';
$google_login = '';
$google_client_id = '';
$google_client_secret = '';
$facebook_login = '';
$facebook_client_id = '';
$facebook_client_secret = '';
$twitter_login = '';

foreach ($setting as $key => $value) {

 if($value->key_term=='require_email_confirmation'){
        $require_email_confirmation = $value->value;
    }

    if($value->key_term=='disable_registration'){
        $disable_registration = $value->value;
    }

        if($value->key_term=='single_device_login'){
        $single_device_login = $value->value;
    }

        if($value->key_term=='google_login'){
        $google_login = $value->value;
    }

        if($value->key_term=='google_client_id'){
        $google_client_id = $value->value;
    }

        if($value->key_term=='google_client_secret'){
        $google_client_secret = $value->value;
    }

        if($value->key_term=='facebook_login'){
        $facebook_login = $value->value;
    }

        if($value->key_term=='facebook_client_id'){
        $facebook_client_id = $value->value;
    }

        if($value->key_term=='facebook_client_secret'){
        $facebook_client_secret = $value->value;
    }

        if($value->key_term=='twitter_login'){
        $twitter_login = $value->value;
    }
        
}
?>



<h2>Authentication</h2>
<h6>Configure registration, social login and related 3rd party integrations.</h6>
<div class="card-body">
  <div class="form-group col-md-12">
    <label class="col-md-12" >Require Email Confirmation</label>
    <label class="switch">
      <input type="checkbox" name="require_email_confirmation"  <?php if($require_email_confirmation=='yes') echo "checked" ?>>
      <span class="slider round"></span>
    </label>
    <div class="clearfix"></div>
    <small class="col-md-12" >Require new users to validate their email address before being able to login.</small>
  </div>
  <div class="form-group col-md-12">
    <label class="col-md-12" >Disable Registration</label>
    <label class="switch">
      <input type="checkbox" name="disable_registration"  <?php if($disable_registration=='yes') echo "checked" ?>>
      <span class="slider round"></span>
    </label>
    <div class="clearfix"></div>
    <small class="col-md-12" >All registration (including social login) will be disabled.</small>
  </div>
  <div class="form-group col-md-12">
    <label class="col-md-12" >Single Device Login</label>
    <label class="switch">
      <input type="checkbox" name="single_device_login"  <?php if($single_device_login=='yes') echo "checked" ?>>
      <span class="slider round"></span>
    </label>
    <div class="clearfix"></div>
    <small class="col-md-12" >Only allow one device to be logged into user account at the same time.</small>
  </div>
  <div class="form-group col-md-12">
    <label class="col-md-12" >Google Login</label>
    <label class="switch">
      <input type="checkbox" name="google_login"  <?php if($google_login=='yes') echo "checked" ?>>
      <span class="slider round"></span>
    </label>
    <div class="clearfix"></div>
    <small class="col-md-12" >Enable logging into the site via google.</small>
  </div>
  <div class="form-group col-md-12">
    <label>
      Google Client ID
    </label>
    <input type="text" name="google_client_id" value="{{$google_client_id}}" class="form-control">
    
  </div>
  <div class="form-group col-md-12">
    <label>
      Google Client Secret
    </label>
    <input type="text" name="google_client_secret" value="{{$google_client_secret}}" class="form-control">
    
  </div>
  <div class="form-group col-md-12">
    <label class="col-md-12" >Facebook Login</label>
    <label class="switch">
      <input type="checkbox" name="facebook_login"  <?php if($facebook_login=='yes') echo "checked" ?>>
      <span class="slider round"></span>
    </label>
    <div class="clearfix"></div>
    <small class="col-md-12" >Enable logging into the site via facebook.</small>
  </div>
  <div class="form-group col-md-12">
    <label>
      Facebook Client ID
    </label>
    <input type="text" name="facebook_client_id" value="{{$facebook_client_id}}" class="form-control">
    
  </div>
  <div class="form-group col-md-12">
    <label>
      Facebook Client Secret
    </label>
    <input type="text" name="facebook_client_secret" value="{{$facebook_client_secret}}"  class="form-control">
    
  </div>
  <div class="form-group col-md-12">
    <label class="col-md-12" >Twitter Login</label>
    <label class="switch">
      <input type="checkbox" name="twitter_login"  <?php if($twitter_login=='yes') echo "checked" ?>>
      <span class="slider round"></span>
    </label>
    <div class="clearfix"></div>
    <small class="col-md-12" >Enable logging into the site via twitter.</small>
  </div>
  
  <div class="form-group col-md-12">
    <label>
      Twitter Client ID
    </label>
    <input type="text" class="form-control">
    
  </div>
  <div class="form-group col-md-12">
    <label>
      Twitter Client Secret
    </label>
    <input type="text" class="form-control">
    
  </div>
</div>