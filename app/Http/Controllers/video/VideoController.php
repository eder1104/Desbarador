<?php

namespace App\Http\Controllers\video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('plantillas.video.indexvideo');
    }
}