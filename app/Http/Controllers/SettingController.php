<?php

namespace App\Http\Controllers;
use App\Models\AdminSetting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
	public function settingsform($id){

        $types = AdminSetting::get();
	   	$form = SettingForm::where('service_id',$id)->get();
    	return view('templates.admin.service_form',compact('form','types','id'));	   	
	}
    public function settings(){

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

        $setting=AdminSetting::all();     	
    	return view('templates.admin.setting',compact('array','setting'));
    }



    public function save_settings(Request $r){





        $inputs = $r->all();
        foreach($inputs as $key => $all){
                if($key!=='id' && $key!=='_token' && $key!=='submit'){
                $field=AdminSetting::where('key_term',$key)->first();
                if(empty($field)){
                    AdminSetting::insert(['key_term'=>$key]);
                    AdminSetting::where('key_term',$key)->update(['value' => $all]);
                }else{
                    AdminSetting::where('key_term',$key)->update(['value' => $all]);            
                }    





                 if ($r->hasFile($key)) 
                            {

                            $destinationPath = public_path()."/images/front";
                            $extension =  $r->file($key)->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$r->file($key)->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = asset("/public/images")."/".$fileName;

                                 $field=AdminSetting::where('key_term',$key)->first();
                                                if(empty($field)){
                                                    AdminSetting::insert(['key_term'=>$key]);
                                                    AdminSetting::where('key_term',$key)->update(['value' => $picture]);
                                                }else{
                                                    AdminSetting::where('key_term',$key)->update(['value' => $picture]);            
                                                }   

                        }



            }

        }
        //alert()->success('Updated');
        return redirect()->back();


    


    }

}
