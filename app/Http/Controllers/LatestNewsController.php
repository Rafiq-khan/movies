<?php

namespace App\Http\Controllers;

use App\Models\LatestNews;
use Illuminate\Http\Request;
use Validator;

class LatestNewsController extends Controller
{


    public function recent_news(){
          $page_title='::Admin-News';
          $news = LatestNews::paginate(30);  
          return view('templates.admin.recent_news',compact('news','page_title'));
    }
    public function addnews(){
        
        $addnews = NULL;  
        return view('templates.admin.addnews',compact('addnews'));
  }


  public function addnewnews(Request $request){


            $validator = Validator::make(
                [
                    'title' => $request->title,
                    'source' => $request->source,
                    'image' => $request->image,
                    'image_url' => $request->image_url,
                ],
                [

                    'title' => 'required',
                    'source' => 'required',
                    'image' =>  isset($request->image)?'required':'',
                    'image_url' => isset($request->image_url)?'required':'',
                ]
            );

            if ($validator->fails())
            {
                  Alert::error('Fill All Required Feilds');        
                  return redirect()->back()->withInput(Input::all());                

            }else{


              $new = new LatestNews();
              $new->text = $request->title;
              $new->source = $request->source;
              $new->live = 'live';  

               if ($request->hasFile('image')) 
                    {

                    $destinationPath = public_path()."/images/news/";
                    $extension =  $request->file('image')->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('image')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $picture = asset("/public/images/news/")."/".$fileName;
                    

                }else{

                  $picture = $request->image_url;

                }


                $new->image = $picture;
                $new->save();

            }

      return redirect()->route('news');
  }
    

public function editnews($id)
{
        $addnews = LatestNews::where('id',$id)->first();  
        return view('templates.admin.addnews',compact('addnews'));
}


public function deletenews($id)
{
 
         $addnews = LatestNews::where('id',$id)->delete();  
             return redirect()->route('news');
}




  public function updatenews(Request $request){


            $validator = Validator::make(
                [
                    'title' => $request->title,
                    'source' => $request->source,
                    'image' => $request->image,
                    'image_url' => $request->image_url,
                ],
                [

                    'title' => 'required',
                    'source' => 'required',
                    'image' =>  isset($request->image)?'required':'',
                    'image_url' => isset($request->image_url)?'required':'',
                ]
            );

            if ($validator->fails())
            {
                  Alert::error('Fill All Required Feilds');        
                  return redirect()->back()->withInput(Input::all());                

            }else{


              $new = LatestNews::where('id',$request->id)->first();  
              $new->text = $request->title;
              $new->source = $request->source;
              $new->live = 'live';  

               if ($request->hasFile('image')) 
                    {

                    $destinationPath = public_path()."/images/news/";
                    $extension =  $request->file('image')->getClientOriginalExtension();
                    $fileName = time();
                    $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                    if(!$request->file('image')->move($destinationPath,$fileName))
                    {
                        throw new \Exception("Failed Upload");                    
                    }

                    $picture = asset("/public/images/news/")."/".$fileName;
                    

                }else{

                  $picture = isset($request->image_url)?$request->image_url:$new->image;

                }


                $new->image = $picture;
                $new->save();

            }

      return redirect()->route('news');
  }


}
