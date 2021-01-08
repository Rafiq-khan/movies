<?php

namespace App\Http\Controllers;

use App\Models\UserSurveyFormValues;
use Illuminate\Http\Request;
use App\Models\SurveyDetails;
use App\Models\Survey;

class UserSurveyFormValuesController extends Controller
{

    public function save_all_forms(){

        $page_title = 'Save Forms';
        $details = SurveyDetails::where('service_id','33')->get();


        $survey = Survey::where('id','33')->first();
        if(!$survey){
            return view('errors.404');
        }else{
            
            $data = SurveyDetails::where('service_id',$survey->id)->get();
            $frmData = UserSurveyFormValues::where('service_id',$survey->id)->groupBy('session_id')->select('session_id','service_form_input_id')->get();

        }

            $userData = $frmData;


        return view('admin.save_forms',compact('details','page_title','userData'));

    }

}
