<?php

namespace App\Http\Controllers\audio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WavController extends Controller
{
    public function index()
    {
        return view('plantillas.audio.Wav');
    }
}