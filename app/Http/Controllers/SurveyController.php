<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdminSetting;
use App\Models\SettingForm;
use App\Models\AdminSettingValue;
use Auth;
use Alert;
use App\Models\User;
use Session;
use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;


class SurveyController extends Controller
{
    public function index()
    {
    	$setting = AdminSetting::orderBy('id','desc')->paginate(15);
        $page_title = 'AdminSettings';
    	return view('services.list', compact('setting','page_title'));
    }

	public function create()
    {
        $survey = NULL;
        $page_title = 'Add Survey';
        return view('services.add-edit',compact('survey','page_title'));
    }

    public function store(Request $request)
    {

         $this->validate($request,[
            'name' => 'required',
            'url' => 'required',
       ]);

    	$service = new AdminSetting;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->url = $request->url;
        $service->long_desc = $request->long_description;        
        $service->button_text = $request->button_text;

                    if ($request->hasFile('profile')) 
                            {

                            $destinationPath = public_path()."/images/surveys/";
                            $extension =  $request->file('profile')->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$request->file('profile')->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = asset("/public/images/surveys/")."/".$fileName;
                            $service->image = $picture;

                        }

        $service->save();

        alert()->success('Saved...!!!');    
        return redirect()->route('admin.surveys.list');
    }
 
    public function surveys_form($url){

            $page_title = 'Survey Form';
          $service = AdminSetting::where('url',$url)->first();
          if(empty($service)){

                return redirect()->route('admin.surveys.list');

          }else{

          $form = SettingForm::where('service_id',$service->id)->get();
          $id = $service->id;             
          return view('services.service_form',compact('id','form','page_title'));  

          }  

    }

    public function services(){

            $services = Service::all();     
          return view('front.services',compact('services'));  
    }    

    public function book_service($url){

                $check = user_check();
        if(!$check){
            return view('errors.404');
        }
            $service = Service::where('url',$url)->with('form_data')->first();     
            return view('users.book_service',compact('service'));  
    }    

    public function save_survey(Request $r){
        $survey_id = $r->survey_id;
        $data = SettingForm::where('service_id',$survey_id)->get();

        $service = AdminSetting::where('id',$survey_id)->first();           

        foreach($data as $d){
            $user_values = new AdminSettingVlaue;            
            $user_values->user_id=1;
            $user_values->session_id = Session::getId();
            $user_values->service_id=$survey_id; 
            $user_values->service_form_input_id=$d->id;
            if($d->type!='file'){
                $user_values->value = $r->input($d->name); 
            }else{

                            $destinationPath = public_path()."/survey/images";
                            $extension =  $r->file($d->name)->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$r->file($d->name)->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = asset("/public/survey/images/")."/".$fileName;
                            $user_values->value = $picture; 
            } 

            $user_values->save();
        }


        alert()->success('Success');                                          
        return redirect()->back();

    }



    public function service_details($url){

                $check = user_check();
        if(!$check){
            return view('errors.404');
        }

            $service = Service::where('url',$url)->with('slider.slider_images','user_services')->first();  
            $user_service = UserServices::where('user_id',Auth::user()->id)->where('service_id',$service->id)->first();
            if(empty($service)){
             return redirect()->route('user.services');  
            }else{
            return view('users.service_details',compact('service','user_service'));                  
            }


    }    

    public function edit_service($url){

            $service = Service::where('url',$url)->with('slider.slider_images')->first();
            if(empty($service)){
             return redirect()->route('services.list');  
            }else{
             return view('services.edit',compact('service'));                   
            }    

    }    

    public function save_edit_service(Request $request){

       $this->validate($request,[
            'name' => 'required',
            'url' => 'required',
       ]);


        $service = Service::where('id',$request->service_id)->first();

        $service->name = $request->name;
        $service->description = $request->description;
        $service->url = $request->url;
        $service->long_desc = $request->long_description;        
        $service->button_text = $request->button_text;              
        $service->require_details = $request->details;
        if(isset($request->register_new_user)){
                $service->register_new_user='true';
        }else{
                $service->register_new_user='false';            
        }
                          
        $service->save();
        
        $dirname = public_path('public\images\services\\'.$service->id);

            if (!is_dir($dirname)) {
                mkdir($dirname,0777, true);
            }

        if(!empty($request->file('profile'))){

        $file = $request->file('profile');
        $name = md5(date('Y-m-d').microtime()).'.'.$file->getClientOriginalExtension();
        $file->move($dirname, $name);
        $service->image = $name;
        $service->save();
        }    


        if(!empty($request->file('banners'))){

        $file = $request->file('banners');
        $name = md5(date('Y-m-d').microtime()).'.'.$file->getClientOriginalExtension();
        $file->move($dirname, $name);
        $service->banner = $name;
        $service->save();

        }    

        

        $service_slide = ServicesSlider::where('service_id',$request->service_id)->first();         

        if(isset($request->slider_name)){
            $service_slide->name = $request->slider_name;
            $service_slide->save();
        }
        

        if(!empty($request->slide_id)){
        if(sizeof($request->slide_id) > 0){
            for($rt = 0; $rt<sizeof($request->slide_id);$rt++){
            $slide_images = ServiceSliderDetails::where('id',$request->slide_id[$rt])->first();         
                if(!empty($request->slide_image[$rt])){
                    $slideimg = $request->slide_image[$rt];                    
                    $name = md5(date('Y-m-d').microtime()).'.'.$slideimg->getClientOriginalExtension();
                    $slideimg->move($dirname,$name);
                    $slide_images->name = $name;
                    $caption = $request->caption_text[$rt];     
                    $slide_images->caption = $caption;                                
                    $slide_images->save();
                }else{

                    $caption = $request->caption_text[$rt];     
                    $slide_images->caption = $caption;                                
                    $slide_images->save();

                }
            }
        }
    }

        if(!empty($request->slide_image) > 0){

            $rr = $rt;
            while(!empty($request->slide_image[$rr])){

                 $slideimg = $request->slide_image[$rr];
                 $caption = $request->caption_text[$rr];
                $name = md5(date('Y-m-d').microtime()).'.'.$slideimg->getClientOriginalExtension();
                $slideimg->move($dirname,$name);
                $service_slide_images = new ServiceSliderDetails;
                $service_slide_images->name = $name;
                $service_slide_images->service_id = $request->service_id;                
                $service_slide_images->slider_id = $service_slide->id; 
                $service_slide_images->caption = $caption;
                $service_slide_images->save();
                $rr++;
            }

        }
            return redirect()->route('services.list')
            ->withSuccess(trans('Edited'));
    }


    public function user_services(){

        $check = user_check();
        if(!$check){
            return view('errors.404');
        }
        $myservices = UserServices::where('user_id',Auth::user()->id)->get(); 
        $services = Service::with('user_services')->get();

        return view('users.services',compact('services','myservices'));
    }

    public function view_service_form($url){

                $check = user_check();
        if(!$check){
            return view('errors.404');
        }

            $service = Service::where('url',$url)->with('form_data')->first();
            $textname = array();
            foreach($service->form_data as $data){
                if($data->type=='textarea'){
                    array_push($textname, $data->name);
                }
                
            }
            if(empty($service)){

                Alert::error('Cannot Process');
                return redirect()->route('user.services');

            }else{

            $userservice = UserServices::where('service_id',$service->id)->where('user_id',Auth::user()->id)->first();             
            $user_values = UserServiceFormValues::where('user_id',Auth::user()->id)->where('service_id',$service->id)->get();
            return view('users.user_service_form',compact('service','user_values','userservice','textname'));  

            } 


    }

    public function update_service_booking(Request $r){


            $service_id = $r->service_id;
            $service = Service::where('id',$service_id)->with('form_data')->first(); 
            $user_values = UserServiceFormValues::where('user_id',Auth::user()->id)->where('service_id',$service_id)->get();

            $userservices = UserServices::where('service_id',$service_id)->where('user_id',Auth::user()->id)->first();


            foreach($service->form_data as $ser){
            $user_values = UserServiceFormValues::where('user_id',Auth::user()->id)->where('service_id',$service_id)->where('service_form_input_id',$ser->id)->first();                
            if(empty($user_values)){

            $user_values  = new UserServiceFormValues;
            $user_values->user_id = Auth::user()->id;
            $user_values->service_id = $service_id;
            $user_values->service_form_input_id = $ser->id;
            $user_values->value = $r->input($ser->name);                            
            $user_values->save();

            }else{

            $user_values->value = $r->input($ser->name);
            $user_values->save();

            }

            }  
        $log = new Logs;
        $log->user_id=Auth::user()->id;
        $log->description=Auth::user()->first_name.' '.Auth::user()->last_name.' Updated Service Form of Service '.$service->name;
        $log->save();


        Alert::success('Successfully Updated');                                  
        return redirect()->back();
    }

    public function unsubscribe_service(Request $r){

                $check = user_check();
        if(!$check){
            return view('errors.404');
        }

        UserServices::where('service_id',$r->id)->where('user_id',Auth::user()->id)->delete();
        UserServiceFormValues::where('user_id',Auth::user()->id)->where('service_id',$r->id)->delete();
        $service = Service::where('id',$r->id)->first();    

        $log = new Logs;
        $log->user_id=Auth::user()->id;
        $log->description=Auth::user()->first_name.' '.Auth::user()->last_name.' Unsubscribed '.$service->name.' Service';
        $log->save();

        Alert::success('Unsubscribed');                                  
        return redirect()->back();
    }

    public function view_service_users($url){

                $check = user_check();
        if(!$check){
            return view('errors.404');
        }

        $service = Service::where('url',$url)->with('form_data.form_data')->first();
        if(empty($service)){

                Alert::error('Cannot Process');
                return redirect()->route('user.services');

        }else{

        $users = UserServices::where('service_id',$service->id)->with('user_services','requested_user')->get();
        //->where('user_id','!=',Auth::user()->id)


        return view('users.service_users',compact('users','service'));

        }

    }


    public function load_survey($slug){

        $survey = AdminSetting::where('url',$slug)->first();
        if(!$survey){
            return view('errors.404');
        }else{
            
            $data = SettingForm::where('service_id',$survey->id)->get();
            return view('home.survey',compact('survey','data'));            
        }

    }


    public function surveys_form_submission($slug){

        $page_title = 'Surveys Forms Submissions';
        $survey = AdminSetting::where('url',$slug)->first();
        if(!$survey){
            return view('errors.404');
        }else{
            
            $data = SettingForm::where('service_id',$survey->id)->get();
            $frmData = AdminSettingVlaue::where('service_id',$survey->id)->groupBy('session_id')->select('session_id')->paginate(1);

/*            $forms = collect();
            foreach($data as $d){   
                $dts = AdminSettingVlaue::where('service_id',$survey->id)->where('session_id',$d->session_id)->with('form_data')->get();
                $forms->push($dts);
            }

*/          
            $userData = $frmData;
            return view('admin.survey_submission',compact('survey','data','page_title','userData'));            
        }

    }



}

