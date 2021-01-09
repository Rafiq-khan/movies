<?php

namespace App\Http\Controllers;

use App\Models\LatestTags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function tags()
    {
        $page_title = '::Admin-News';
        $news = LatestTags::paginate(30);
        return view('templates.admin.tags', compact('news', 'page_title'));
    }

    public function addtags()
    {
        $addtags = LatestTags::get();
        return view('templates.admin.addtags', compact('addtags'));
    }

    public function addnewtags(Request $request)
    {

        // dd($request);


        LatestTags::insert([

            'name' => $request->name,
            'type' => $request->type,
            'display_name' => $request->display_name,


        ]);
        return redirect()->route('tags');
    }


    public function updatenewtags(Request $request){

        $tags = LatestTags::where('id',$request->id)->first();
        $tags->name = $request->name;
        $tags->type = $request->type;
        $tags->display_name = $request->display_name;
        $tags->save();
        return redirect()->route('tags');

    }
}
