<?php

namespace App\Http\Controllers\video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function convertIndex(Request $request)
    {
        return response()->json([
            'mensaje' => 'Ruta de video conectada',
            'datos' => $request->all()
        ]);
    }
}