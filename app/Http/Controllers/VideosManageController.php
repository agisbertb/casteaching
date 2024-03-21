<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosManageController extends Controller
{

    public function testedBy()
    {
        return VideosManageControllerTest::class;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videos.manage.index',[
            'videos' => Video::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url
        ]);

        session()->flash('status','Successfully created');

        VideoCreated::dispatch($video);

        return redirect(route('manage.videos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('videos.manage.edit', [
            'video' => Video::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;
        $video->save();

        session()->flash('status','Successfully updated');
        return redirect(route('manage.videos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Video::destroy($id);
        session()->flash('status','Successfully deleted');
        return redirect(route('manage.videos'));
    }
}
