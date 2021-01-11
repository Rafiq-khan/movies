<?php

namespace App\Http\Controllers;

use App\Models\LatestVideo;
use Illuminate\Http\Request;
use Validator;

class VideoController extends Controller
{
    public function video()
    {
        $video = LatestVideo::get();
        return view('templates.admin.video', compact('video'));
    }



    public function add_video()
    {
        $add_video = LatestVideo::get();
        return view('templates.admin.add_video', compact('add_video'));
    }


    public function addnewvideo(Request $request)
    {


  $validator = Validator::make(
                [
                    'name' => $request->name,
                    'type' => $request->type,
                    'quality' => $request->quality,
                    'language' => $request->language,
                    'title' => $request->title,
                    'category' => $request->category,
                    'position' => $request->position,                
                ],
                [

                    'name' => 'required',
                    'type' => 'required',
                    'quality' =>  'required',
                    'language' => 'required',
                    'title' => 'required',
                    'category' => 'required',
                    'position' =>  'required',                    
                ]
            );

            if ($validator->fails())
            {
                  Alert::error('Fill All Required Feilds');        
                  return redirect()->back()->withInput(Input::all());                

            }else{




if ($request->hasFile('thumbnail')) 
                    {

                    $destinationPath = public_path()."/images/videos/";
                    $extension =  $request->file('thumbnail')->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('thumbnail')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/public/images/videos/")."/".$fileName;
                    

                }else{

                  $thumbnail = $request->thumbnail_name;

                }


if ($request->hasFile('video_file')) 
                    {

                    $destinationPath = public_path()."/images/videos/";
                    $extension =  $request->file('video_file')->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('video_file')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $video_file = asset("/public/images/videos/")."/".$fileName;
                    

                }else{

                  $video_file = $request->video_url;

                }


        LatestVideo::insert([

            'name' => $request->name,
            'thumbnail' => $thumbnail,
            'type' => $request->type,
            'video_file' => $video_file,
            'quality' => $request->quality,
            'language' => $request->language,
            'title' => $request->title,
            'category' => $request->category,
            'position' => $request->position,


        ]);


    }
        return redirect()->route('video');
    }


public function editvideo($id)
{
        $add_video = LatestVideo::where('id',$id)->first();  
        return view('templates.admin.add_video', compact('add_video'));
}


public function deletevideo($id)
{
 
         $video = LatestNews::where('id',$id)->delete();  
         return redirect()->route('video');
}

public function updatevideo(Request $request){
   

  $validator = Validator::make(
                [
                    'name' => $request->name,
                    'type' => $request->type,
                    'quality' => $request->quality,
                    'language' => $request->language,
                    'title' => $request->title,
                    'category' => $request->category,
                    'position' => $request->position,                
                ],
                [

                    'name' => 'required',
                    'type' => 'required',
                    'quality' =>  'required',
                    'language' => 'required',
                    'title' => 'required',
                    'category' => 'required',
                    'position' =>  'required',                    
                ]
            );

            if ($validator->fails())
            {
                  Alert::error('Fill All Required Feilds');        
                  return redirect()->back()->withInput(Input::all());                

            }else{




if ($request->hasFile('thumbnail')) 
                    {

                    $destinationPath = public_path()."/images/videos/";
                    $extension =  $request->file('thumbnail')->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('thumbnail')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $thumbnail = asset("/public/images/videos/")."/".$fileName;
                    

                }else{

                  $thumbnail = $request->thumbnail_name;

                }


if ($request->hasFile('video_file')) 
                    {

                    $destinationPath = public_path()."/images/videos/";
                    $extension =  $request->file('video_file')->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('video_file')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $video_file = asset("/public/images/videos/")."/".$fileName;
                    

                }else{

                  $video_file = $request->video_url;

                }


    
              $video = LatestVideo::where('id',$request->id)->first();  
              $video->name =  $request->name;
              $video->type =  $request->type;
              $video->quality =  $request->quality;
              $video->language =  $request->language;
              $video->title =  $request->title;
              $video->category =  $request->category;
              $video->position =  $request->position;

              if(isset($video_file)){   

                $video->video_file = $video_file;

              }

              if(isset($thumbnail)){
                $video->thumbnail = $thumbnail;
              }



              $video->save();
    }
        return redirect()->route('video');


}


}
