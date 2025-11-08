<?php

namespace App\Http\Controllers\Audio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function convertIndex(Request $request, $formato_origen)
    {
        $request->validate([
            'audio_file' => 'required|file',
            'target_format' => 'required|string'
        ]);

        $file = $request->file('audio_file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $targetFormat = $request->input('target_format');

        $tempPath = $file->getPathname();
        $outputName = $originalName . '.' . $targetFormat;
        $outputPath = storage_path('app/public/' . $outputName);

        $command = "ffmpeg -i " . escapeshellarg($tempPath) . " " . escapeshellarg($outputPath);
        exec($command);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
