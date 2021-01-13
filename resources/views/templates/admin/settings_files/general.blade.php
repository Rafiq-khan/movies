<?php
$site_url = '';
$site_homepage= '';
$site_theme= '';
$theme_change= '';

foreach ($setting as $key => $value) {

    if($value->key_term=='site_url'){
        $site_url = $value->value;
    }

    if($value->key_term=='site_homepage'){
        $site_homepage = $value->value;
    }

    if($value->key_term=='site_theme'){
        $site_theme = $value->value;
    }

    if($value->key_term=='theme_change'){
        $theme_change = $value->value;
    }
        
}
?>

								
								<h2>General</h2>
								<h6>Configure general site settings.</h6>

								<div class="row">

									<div class="form-group col-md-12">
	                                    <label for="exampleInputEmail1">Site Url</label>
	                                    <input type="text" name="site_url" required class="form-control" id="exampleInputEmail1" placeholder="Site Url" value="{{$site_url}}">
	                                </div>


	                                 <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Site Homepage</label>
                                    <select name="site_homepage" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($setting))


                                        <option value="default" <?php if($site_homepage=='embed') echo "selected"; ?>>Default</option>
                                        <option value="application_page" <?php if($site_homepage=='direct_video') echo "selected"; ?>>Application Page</option>
                                        <option value="custom_page" <?php if($site_homepage=='adaptive_stream') echo "selected"; ?>>Custom Page</option>
                                       


                                        @else
                                        <option value="default" >Default</option>
                                        <option value="application_page"  selected>Application Page</option>
                                        <option value="custom_page" >Custom Page</option>

                                        @endif
                                    </select>
                                    <small>Type of the homepage.</small>
                                </div>



								<div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Default Site Theme</label>
                                    <select name="site_theme" required class="form-control" id="exampleInputEmail1">
                                        @if(isset($setting))


                                        <option value="light" <?php if($site_theme=='light') echo "selected"; ?> > Light</option>
                                        <option value="dark" <?php if($site_theme=='dark') echo "selected"; ?>>Dark</option>
                                       
                                        @else
                                        <option value="light" >Light</option>
                                        <option value="dark"  selected>Dark</option>

                                        @endif
                                    </select>
                                </div>


                                

                                <div class="form-group col-md-12">
                                <label class="col-md-12" >Allow Theme Change</label>
                                <label class="switch">
                                  <input type="checkbox" name="theme_change" <?php if($theme_change=='yes') echo "checked" ?>>
                                  <span class="slider round"></span>
                                </label>
                                <div class="clearfix"></div>
                                 <small class="col-md-12" >Allow user to switch from dark to light mode and vice versa.</small>
                                </div>


                                

								</div>
