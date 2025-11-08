@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-10">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">
        📸 Galería de Imágenes
    </h1>

    @php
    use Illuminate\Support\Facades\File;

    $path = resource_path('views/plantillas/imagenes');
    $archivos = File::files($path);
    $imagenes = [];

    foreach ($archivos as $archivo) {
    $nombre = pathinfo($archivo->getFilename(), PATHINFO_FILENAME);
    $nombre = preg_replace('/(\.blade|\.php)$/i', '', $nombre);
    if (strtolower($nombre) === 'indeximagenes') continue;

    $imagenes[] = [
    'nombre' => $nombre,
    'ruta' => route('imagenes.show', ['archivo' => $nombre])
    ];
    }
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($imagenes as $imagen)
        <div class="bg-white shadow-md rounded-lg p-4 text-center transform hover:scale-105 transition duration-300">
            <h3 class="text-lg font-semibold text-blue-600 mb-2">
                {{ ucfirst($imagen['nombre']) }}
            </h3>
            <a href="{{ $imagen['ruta'] }}" class="inline-block mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Abrir
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection