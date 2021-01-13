<?php
$contact_recaptcha = '';
$registration_recaptcha = '';
$recaptcha_v3_site_key = '';
$recaptcha_v3_secret_key = '';
foreach ($setting as $key => $value) {

 if($value->key_term=='contact_recaptcha'){
        $contact_recaptcha = $value->value;
    }

    if($value->key_term=='registration_recaptcha'){
        $registration_recaptcha = $value->value;
    }


    if($value->key_term=='recaptcha_v3_site_key'){
        $recaptcha_v3_site_key = $value->value;
    }

    if($value->key_term=='recaptcha_v3_secret_key'){
        $recaptcha_v3_secret_key = $value->value;
    }

  }
?>
<h2>Recaptcha</h2>
<h6>Configure google recaptcha integration and credentials.
</h6>
<div class="form-group col-md-12">
  <label class="col-md-12" >Contact Recaptcha</label>
  <label class="switch">
    <input type="checkbox" name="contact_recaptcha" <?php if($contact_recaptcha=='yes') echo "checked" ?>>
    <span class="slider round"></span>
  </label>
  <div class="clearfix"></div>
  <small class="col-md-12" >Enable recaptcha integration for "contact us" page.</small>
</div>
<div class="form-group col-md-12">
  <label class="col-md-12" >Registration Recaptcha</label>
  <label class="switch">
    <input type="checkbox" name="registration_recaptcha" <?php if($registration_recaptcha=='yes') echo "checked" ?>>
    <span class="slider round"></span>
  </label>
  <div class="clearfix"></div>
  <small class="col-md-12" >Enable recaptcha integration for registration page.</small>
</div>
<div class="form-group col-md-12">
  <label>
    Recaptcha V3 Site Key
  </label>
  <input type="text" name="recaptcha_v3_site_key" value="{{$recaptcha_v3_site_key}}" class="form-control">
</div>
<div class="form-group col-md-12">
  <label>
    Recaptcha V3 Secret Key
  </label>
  <input type="text" name="recaptcha_v3_secret_key" value="{{$recaptcha_v3_secret_key}}" class="form-control">
</div>