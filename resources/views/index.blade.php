@extends('layouts.app')

@section('content')
<section class="text-center mt-10">
    <h1 class="text-4xl font-bold text-blue-700 mb-4">Bienvenido a Desbarador</h1>
    <p class="text-lg text-gray-700 max-w-xl mx-auto">
        Igual de alcahuetas que tu mamá haciéndote un trabajo a las 2 am
    </p>
    <div class="emoji">
        <img src="https://twemoji.maxcdn.com/v/latest/svg/1f1e8-1f1f4.svg" alt="🇨🇴" class="emoji-bandera">
    </div>
</section>

<section class="mt-12 flex flex-col items-center">
    <h1 class="text-2xl font-bold mb-6">Tipos de Archivos Disponibles</h1>

    @php
    use Illuminate\Support\Facades\File;

    $ruta = resource_path('views/plantillas');
    $carpetas = File::directories($ruta);

    $emojis = [
    'audio' => '🎧',
    'documentos' => '📄',
    'hojas_calculo' => '📈',
    'imagenes' => '🖼️',
    'presentaciones' => '📊',
    'video' => '🎞️',
    ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-3/4">
        @foreach ($carpetas as $carpeta)
        @php
        $nombreCarpeta = basename($carpeta);
        $emoji = $emojis[$nombreCarpeta] ?? '📁';
        $nombreLegible = ucfirst(str_replace('_', ' ', $nombreCarpeta));
        @endphp

        @if($nombreCarpeta === 'hojas_calculo')
        <div class="bg-yellow-100 shadow-md rounded-lg p-6 text-center transform hover:scale-105 transition duration-300">
            <h3 class="text-lg font-semibold text-yellow-700 mb-2 flex justify-center items-center gap-2">
                <span>{{ $emoji }}</span>
                <span>Próximamente</span>
                <span>{{ $emoji }}</span>
            </h3>
            <p class="text-yellow-800 desarrollo text-lg mb-4">
                ¡Ojo pues! Esto está en desarrollo, pero pronto vas a poder disfrutar de más servicios!
            </p>
            <div class="emoji">
                <img src="https://twemoji.maxcdn.com/v/latest/svg/1f1e8-1f1f4.svg" alt="🇨🇴" class="emoji-bandera">
            </div>
        </div>
        @else
        <div class="bg-white shadow-md rounded-lg p-6 text-center transform hover:scale-105 transition duration-300">
            <h3 class="text-lg font-semibold text-blue-600 mb-2 flex justify-center items-center gap-2">
                <span>{{ $emoji }}</span>
                <span>{{ $nombreLegible }}</span>
                <span>{{ $emoji }}</span>
            </h3>
            <p class="text-gray-500 mb-4">Revisa los diferentes tipos de conversiones que puedes hacer!</p>
            <a href="{{ route('plantilla.ver', ['categoria' => $nombreCarpeta]) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Ver opciones
            </a>
        </div>
        @endif

        @endforeach
    </div>
</section>

<style>
    .emoji-bandera {
        width: 1.4em;
        height: 1.4em;
        vertical-align: middle;
    }

    .emoji {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
</style>
@endsection