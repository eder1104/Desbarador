<?php

namespace App\Http\Controllers\Imagenes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ConvertController extends Controller
{
    /**
     * Convierte una imagen a otro formato y la descarga.
     *
     * @param Request $request
     * @param string $formato_origen
     * @return \Illuminate\Http\Response
     */
    public function convertIndex(Request $request, $formato_origen,)
    {
        $request->validate([
            'image_file' => 'required|image|max:5120', // máximo 5MB
            'formato_destino' => 'required|string|in:jpg,jpeg,png,gif,bmp,webp'
        ]);

        $file = $request->file('image_file');
        $nombreOriginal = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $formatoDestino = strtolower($request->input('formato_destino'));

        $pathTemp = $file->storeAs('temp', $nombreOriginal . '.' . $file->getClientOriginalExtension());

        $imagen = Image::make(Storage::path($pathTemp));
        $nombreConvertido = $nombreOriginal . '.' . $formatoDestino;
        $pathConvertido = Storage::path('temp/' . $nombreConvertido);

        $imagen->save($pathConvertido, 90, $formatoDestino);

        return response()->download($pathConvertido)->deleteFileAfterSend(true);
    }
}
