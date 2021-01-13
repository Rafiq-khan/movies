<?php


$from_address = '';
$contact_page_address = '';
$from_name = '';
$outgoing_mail_method = '';
$mailgun_domain = '';
$mailgun_api_key = '';


foreach ($setting as $key => $value) {

 if($value->key_term=='from_address'){
        $from_address = $value->value;
    }

    if($value->key_term=='contact_page_address'){
        $contact_page_address = $value->value;
    }

        if($value->key_term=='from_name'){
        $from_name = $value->value;
    }

        if($value->key_term=='outgoing_mail_method'){
        $outgoing_mail_method = $value->value;
    }

        if($value->key_term=='mailgun_domain'){
        $mailgun_domain = $value->value;
    }

        if($value->key_term=='mailgun_api_key'){
        $mailgun_api_key = $value->value;
    }

        
}
?>
<h2>Mail</h2>
<h6>Change incoming and outgoing email handlers, email credentials and more.</h6>
<div class="form-group col-md-12">
	<label>
		From Address
	</label>
	<input type="text" name="from_address" value="{{$from_address}}" class="form-control">
	<small>All outgoing application emails will be sent from this email address.</small>
	
</div>
<div class="form-group col-md-12">
	<label>
		Contact Page Address
	</label>
	<input type="text" name="contact_page_address" value="{{$contact_page_address}}" class="form-control">
	<small>Where emails from https://mtdb.1.vebto.com/contact page should be sent to.</small>
	
</div>
<div class="form-group col-md-12">
	<label>
		From Name
	</label>
	<input type="text" name="from_name" value="{{$from_name}}" class="form-control">
	<small>All outgoing application emails will be sent using this name.
	</small>
	
</div> 
<div class="form-group col-md-12">
	<span class="badge badge-light badge-striped badge-striped-left border-left-warning" style="text-align: left;font-size: 14px;">
		
		<strong>Important</strong><br>
		Your selected mail method must be authorized to send emails using this address and name.
	</span>
</div>
<div class="form-group col-md-12">
	<label for="exampleInputEmail1">Outgoing Mail Method
	</label>
	<select name="outgoing_mail_method" required class="form-control" id="exampleInputEmail1">
		@if(isset($add_video))
		<option <?php if($outgoing_mail_method=='mailgun') echo "selected"; ?> value="mailgun">Mailgun</option>
		<option <?php if($outgoing_mail_method=='smtp') echo "selected"; ?> value="smtp">SMTP</option>
		<option <?php if($outgoing_mail_method=='sparkpost') echo "selected"; ?> value="sparkpost">SparkPost</option>
		<option <?php if($outgoing_mail_method=='ses') echo "selected"; ?> value="ses">Ses (Amazon Simple Email Service)</option>
		<option <?php if($outgoing_mail_method=='sendmail') echo "selected"; ?> value="sendmail">SendMail</option>
		<option <?php if($outgoing_mail_method=='log') echo "selected"; ?> value="log">Log (Email will be saved to error log)</option>
		
		@else
		<option value="mailgun">Mailgun</option>
		<option value="smtp">SMTP</option>
		<option value="sparkpost">SparkPost</option>
		<option value="ses">Ses (Amazon Simple Email Service)</option>
		<option value="sendmail">SendMail</option>
		<option value="log">Log (Email will be saved to error log)</option>
		@endif
	</select>
	<small>Which method should be used for sending outgoing application emails.
	</small>
</div>
<div class="form-group col-md-12">
	<label>
		Mailgun Domain
	</label>
	<input type="text" name="mailgun_domain" value="{{$mailgun_domain}}" class="form-control">
	<small>Usually the domain of your site (site.com)
	</small>
	
</div>
<div class="form-group col-md-12">
	<label>
		Mailgun API Key
	</label>
	<input type="text" name="mailgun_api_key" value="{{$mailgun_api_key}}" class="form-control">
	<small>Should start with "key-"
	</small>
	
</div>