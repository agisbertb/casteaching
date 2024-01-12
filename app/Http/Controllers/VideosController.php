<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show($id)
    {
        //dd($id);
//    //return 'Ubuntu 101 | Here description | January 11, 2024 15:00';
//    //$video = new stdClass();
//    //$video->title = 'Ubuntu 101';
//    //$video->description = 'Here description';
//    //$video->published_at = 'January 11';

        return view('videos.show', [
            'video' => Video::find($id)
        ]);
    }
}
