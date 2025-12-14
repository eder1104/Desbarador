<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PlantillaController extends Controller
{
    public function verCategoria($categoria)
    {
        $categoria = strtolower($categoria);
        
        $rutasPosibles = [
            resource_path("views/plantillas/{$categoria}"),
            resource_path("views/plantilla/{$categoria}")
        ];

        $rutaReal = null;
        foreach ($rutasPosibles as $ruta) {
            if (File::exists($ruta)) {
                $rutaReal = $ruta;
                break;
            }
        }

        if (!$rutaReal) {
            abort(404);
        }

        $archivos = File::allFiles($rutaReal);
        $plantillas = [];

        foreach ($archivos as $archivo) {
            $nombreCompleto = $archivo->getFilename();
            $nombreLimpio = str_replace(['.blade.php', '.php'], '', $nombreCompleto);
            $nombreLimpio = strtolower($nombreLimpio);

            if (str_contains($nombreLimpio, 'index')) {
                continue;
            }

            $plantillas[] = [
                'nombre' => Str::upper($nombreLimpio),
                'archivo' => $nombreLimpio,
                'ruta' => route('plantilla.archivo', [
                    'categoria' => $categoria, 
                    'archivo' => $nombreLimpio
                ]) 
            ];
        }

        $vistasPosibles = [
            "plantillas.$categoria.index$categoria",
            "plantillas.$categoria.index",
            "plantilla.$categoria.index$categoria",
            "plantilla.$categoria.index"
        ];

        foreach ($vistasPosibles as $vista) {
            if (view()->exists($vista)) {
                return view($vista, compact('categoria', 'plantillas'));
            }
        }

        abort(404);
    }

    public function verArchivo($categoria, $archivo)
    {
        $categoria = strtolower($categoria);
        $archivo = strtolower($archivo);
        $archivo = str_replace('.blade', '', $archivo);
        
        $vistasPosibles = [
            "plantillas.$categoria.$archivo",
            "plantilla.$categoria.$archivo"
        ];

        foreach ($vistasPosibles as $vista) {
            if (view()->exists($vista)) {
                return view($vista);
            }
        }

        abort(404);
    }

    public function convertir(Request $request, $categoria)
    {
        return "Formulario recibido correctamente para la categoría: " . $categoria;
    }
}