<?php

namespace App\Http\Controllers\Audio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class M4aController extends Controller
{
    public function index()
    {
        return view('plantillas.audio.m4a');
    }

    public function convertIndex(Request $request)
    {
        $request->validate([
            'audio_file' => 'required|file|mimes:m4a',
            'target_format' => 'required|string|in:mp3,wav,ogg,aac,flac,m4a,wma,aiff,alac'
        ]);

        $audio = $request->file('audio_file');
        $originalName = pathinfo($audio->getClientOriginalName(), PATHINFO_FILENAME);
        $targetFormat = $request->input('target_format');

        $tempPath = $audio->getPathname();
        $outputName = $originalName . '.' . $targetFormat;
        $outputPath = storage_path('app/public/' . $outputName);

        $command = "ffmpeg -y -i " . escapeshellarg($tempPath) . " " . escapeshellarg($outputPath);
        exec($command);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
