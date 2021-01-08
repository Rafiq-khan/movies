<?php

namespace App\Http\Controllers;

use App\Models\SettingForm;
use Illuminate\Http\Request;
use App\Models\AdminSetting;
use Illuminate\Support\Facades\Input;
use Alert;
use App\Models\AdminSettingValue;

class SurveyDetailsController extends Controller
{
    public function save_details(Request $r){
        
        $this->validate($r,[
            'type' => 'required',
            'name' => 'required',
            'required' => 'required',
            'disable' => 'required',
            'readonly' => 'required',
       ]);            

        $services_check = SettingForm::where('service_id',$r->service_id)->get();

          for($i=0;$i<sizeof($r->type);$i++){
            $service_details = new SettingForm;

            $service_details->service_id = $r->service_id;  
            $service_details->type = $r->type[$i];
            if($r->type[$i]=='radio'){

                $radio_values=$r->input('radio'.$i); 
                $radio_values = serialize($radio_values);
                $service_details->radio_values = $radio_values;      
  
            }
            if($r->type[$i]=='select'){
                $select_option=$r->input('select_option'.$i); 
                $select_option=serialize($select_option);
                $service_details->selectbox_values = $select_option;      
            }

            if($r->type[$i]=='checkbox'){
                $checkbox=$r->input('checkbox_option'.$i); 
                $checkbox=serialize($checkbox);
                $service_details->checkbox_values = $checkbox;      
            }
            

            $rName = str_replace(' ', '_', $r->name[$i]);
            $rID = str_replace(' ', '_', $r->id[$i]);            
            $service_details->label = $r->label[$i];  
            $service_details->name = $rName;    
            $service_details->input_id = $rID;    
            $service_details->default_value = $r->value[$i];   
            $service_details->placeholder = $r->placeholder[$i]; 
            $service_details->is_required = $r->required[$i]; 
            $service_details->is_disable = $r->disable[$i];  
            $service_details->is_readonly = $r->readonly[$i]; 
            $service_details->show_to_user = $r->show_to_user[$i];
            $service_details->as_filter = $r->is_filter[$i];            
            $service_details->save();
          
          }  

/*      alert()->success('SuccessFully Created');                            */
      return redirect()->back();    
    }

        public function new_row(Request $r){
         
            $val = $r->val;
            $val=$val+1;
            return view('templates.admin.dynamic-form',compact('val'));
        }



    public function update_details(Request $r){


        $ids  = $r->form_id;  
        $size = sizeof($r->form_id);  
        $m=0;
        for($i=0;$i<$size;$i++){
            $m=$i+1;
            $id = $ids[$i];  



            $name_result= array_count_values($r->name);

            foreach ($name_result as $key => $val) {
                if($val > 1){
                Alert::error('Name Field Must be Unique');                            
                return back();
                }
            }


            $id_result= array_count_values($r->id);

            foreach ($id_result as $key => $val) {
                if($val > 1){
                Alert::error('ID Field Must be Unique');                            
                return back();
                }
            }

            $service_details = SettingForm::where('id',$id)->first();
            $rName = str_replace(' ', '_', $r->name[$i]);
            $rID = str_replace(' ', '_', $r->id[$i]);            
            $service_details->label = $r->label[$i];  
            $service_details->name = $rName;    
            $service_details->input_id = $rID;    
            $service_details->default_value = $r->value[$i];   
            $service_details->placeholder = $r->placeholder[$i]; 
            $service_details->is_required = $r->required[$i]; 
            $service_details->is_disable = $r->disable[$i];  
            $service_details->is_readonly = $r->readonly[$i]; 
            $service_details->show_to_user = $r->show_to_user[$i];
            $service_details->as_filter = $r->is_filter[$i];
            $service_details->type = $r->type[$i];

            if($r->type[$i]=='radio'){

                $radio_values=$r->input('radio'.$m); 
                $radio_values = serialize($radio_values);
                $service_details->radio_values = $radio_values;      
  
            }
            if($r->type[$i]=='select'){
                $select_option=$r->input('select_option'.$m);
                $select_option=serialize($select_option);
                $service_details->selectbox_values = $select_option;      
            }

            if($r->type[$i]=='checkbox'){
                $checkbox=$r->input('checkbox_option'.$m); 
                $checkbox=serialize($checkbox);
                $service_details->checkbox_values = $checkbox;      
            }
            $service_details->save();


        }  

          for($i=$size;$i<sizeof($r->type);$i++){

            $service_details = new SettingForm;
            $service_details->service_id = $r->service_id;  
            $service_details->type = $r->type[$i];
            if($r->type[$i]=='radio'){

                $radio_values=$r->input('radio'.$i); 
                $radio_values = serialize($radio_values);
                $service_details->radio_values = $radio_values;      
  
            }
            if($r->type[$i]=='select'){
                $select_option=$r->input('select_option'.($i+1)); 
                $select_option=serialize($select_option);
                $service_details->selectbox_values = $select_option;      
            }

            if($r->type[$i]=='checkbox'){
                $checkbox=$r->input('checkbox_option'.$i); 
                $checkbox=serialize($checkbox);
                $service_details->checkbox_values = $checkbox;      
            }
            
            $rName = str_replace(' ', '_', $r->name[$i]);
            $rID = str_replace(' ', '_', $r->id[$i]);            

            $service_details->label = $r->label[$i];  
            $service_details->name = $rName;    
            $service_details->input_id = $rID; 

            $service_details->default_value = $r->value[$i];   
            $service_details->placeholder = $r->placeholder[$i]; 
            $service_details->is_required = $r->required[$i]; 
            $service_details->is_disable = $r->disable[$i];  
            $service_details->is_readonly = $r->readonly[$i]; 
            $service_details->show_to_user = $r->show_to_user[$i];
            $service_details->save();
          
          }  
          
/*        Alert::success('SuccessFully Updated');                            
        */

                return redirect()->back();    
    }    

    public function delete_service_feild($id){
$check = admin_check();
        if(!$check){
            return view('errors.404');
        }

        $delete = SettingForm::where('id',$id)->first();
        $delete = AdminSettingValue::where('service_id',$delete->service_id)->where('service_form_input_id',$id)->delete();
        $delete = SettingForm::where('id',$id)->delete();
        return redirect()->back();    
    }

    public function delete_slide_image($id){

$check = admin_check();
        if(!$check){
            return view('errors.404');
        }
        $service_details = ServiceSliderDetails::where('id',$id)->delete();
        return redirect()->back();            
    }

    public function report($id){
        $check = admin_check();
        if(!$check){
            return view('errors.404');
        }

        $filters = SettingForm::where('service_id',$id)->with('users.us','form_data.us')->get(); 
        $users = AdminSettingValue::where('service_id',$id)->groupby('user_id')->with('us')->get();
        $values = AdminSettingValue::where('service_id',$id)->get();
        $filters2 = array();
        return view('services.reports',compact('filters','users','values','id','filters2'));
    }


    public function reports_search(Request $r){

$check = admin_check();
        if(!$check){
            return view('errors.404');
        }

        $service_id = $r->service_id;
        $values = array();
        $users = array();
        $filters2 = array();


        $filters = SettingForm::where('service_id',$service_id)->with('users.us','form_data.us')->get(); 

        $flt = SettingForm::where('service_id',$service_id)->where('as_filter','true')->get(); 


        foreach($flt as $fl){
            $val = $r->input($fl->name);    
            $value = AdminSettingValue::where('service_id',$service_id)->where('service_form_input_id',$fl->name)->where('value',$val)->first();

            if(!empty($value)){
                array_push($values, (object)$value);                            
            }

            $user = AdminSettingValue::where('service_id',$service_id)->where('service_form_input_id',$fl->name)->where('value',$val)->groupby('user_id')->with('us')->first();  
                      
            if(!empty($user)){
                array_push($users, (object)$user);                            
            }

        }

        foreach ($r->request as $key => $value) {
            foreach($filters as $fl){
                if($key==$fl->name){
                        array_push($filters2, $value);                    
                }
            }
        }

/*        dd($filters2);*/
        /*dd($r->request);*/
        $id = $service_id;
        return view('services.reports',compact('filters','users','values','id','filters2'));
    }

}
