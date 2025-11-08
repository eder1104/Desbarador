<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpcionesController extends Controller
{
    public function index()
    {
        $categorias = [
            'Audio' => ['MP3', 'WAV'],
            'Video' => ['MP4', 'AVI'],
            'Imagen' => ['JPG', 'PNG', 'GIF'],
            'Documento' => ['PDF', 'DOCX', 'XLSX']
        ];

        return view('opciones', compact('categorias'));
    }
}
