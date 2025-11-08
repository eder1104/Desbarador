<?php

namespace App\Http\Controllers\Documentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function convertIndex(Request $request, $formato_origen)
    {
        $request->validate([
            'document_file' => 'required|file',
            'target_format' => 'required|string'
        ]);

        $file = $request->file('document_file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $targetFormat = $request->input('target_format');

        $tempPath = $file->getPathname();
        $outputName = $originalName . '.' . $targetFormat;
        $outputPath = storage_path('app/public/' . $outputName);

        $command = "libreoffice --headless --convert-to " . escapeshellarg($targetFormat) . " " . escapeshellarg($tempPath) . " --outdir " . escapeshellarg(storage_path('app/public/'));
        exec($command);

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}
