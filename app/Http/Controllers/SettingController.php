<?php

namespace App\Http\Controllers;
use App\Models\AdminSetting;
use App\Models\SettingForm;
use App\Models\AdminSettingVlaue;

use Illuminate\Http\Request;

class SettingController extends Controller
{
	public function settingsform($id){

        $types = AdminSetting::get();
	   	$form = SettingForm::where('service_id',$id)->get();
    	return view('templates.admin.service_form',compact('form','types','id'));	   	
	}
    public function settings(){

        $form=SettingForm::all();
    	$array = [];

    	array_push($array, 'General');
    	array_push($array, 'Content');
    	array_push($array, 'Streaming');
    	array_push($array, 'Billing');
    	array_push($array, 'localization');
    	array_push($array, 'Authentication');
    	array_push($array, 'Uploading');
    	array_push($array, 'Mail');
    	array_push($array, 'Cache');
    	array_push($array, 'Analytics');
    	array_push($array, 'Logging');
    	array_push($array, 'Queue');
    	array_push($array, 'Recaptcha');
    	array_push($array, 'GDRP'); 
    	array_push($array, 'Menus'); 
    	array_push($array, 'SEO');
    	array_push($array, 'Themes');     	

/*        foreach($array as $arr){

            $new = New AdminSetting();
            $new->name = $arr;
            $new->url = strtolower($arr);
            $new->save();

        }
*/

    	return view('templates.admin.setting',compact('array','form'));
    }
}
