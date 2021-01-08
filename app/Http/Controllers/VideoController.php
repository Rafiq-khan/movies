<?php

namespace App\Http\Controllers;

use App\Models\LatestVideo;
use Illuminate\Http\Request;

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

        //dd($request);


        LatestVideo::insert([

            'name' => $request->name,
            // 'thumbnail' => $request->thumbnail,
            'type' => $request->type,
            // 'url' => $request->url,
            'quality' => $request->quality,
            'language' => $request->language,
            'title' => $request->title,
            'category' => $request->category,
            'position' => $request->position,


        ]);
        return redirect()->route('video');
    }
}
