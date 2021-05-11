<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $videos = Video::all();

        return view('admin.index', compact('videos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->excerpt = $request->excerpt;
        $video->slug = $request->slug;
        $video->content = $request->content;
        $video->category_id = $request->category_id;
        if ($request->file('video')==null){
            return back()->with("error", "Video yuklanmadi!");
        }

        $vid = $request->file('video');
        $name = time() . '.' . $vid->getClientOriginalExtension();
        $path = public_path('/videos/');
        $vid->move($path, $name);
        $video->video = $name;
        $video->save();
        return redirect('/admin');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $video = Video::find($id);

        return view('admin.show', compact('video'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::all();
        $video = Video::find($id);

        return view('admin.edit', compact('categories','video'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $video->title = $request->title;
        $video->excerpt = $request->excerpt;
        $video->slug = $request->slug;
        $video->content = $request->content;
        $video->category_id = $request->category_id;
        if ($request->file('video')) {

            $vid = $request->file('video');
            $name = time() . '.' . $vid->getClientOriginalExtension();
            $path = public_path('/videos/');
            $vid->move($path, $name);
            $video->video = $name;
        }
        $video->update();
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();
        return redirect('/admin');
    }
}
