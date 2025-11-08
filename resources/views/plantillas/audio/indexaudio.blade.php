@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-10">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">
        🎧 Archivos de Audio
    </h1>

    @if (count($plantillas) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($plantillas as $item)
        @php
        $nombreLimpio = strtolower(str_replace(['.blade', '.php'], '', $item['nombre']));
        @endphp

        @if ($nombreLimpio === 'indexaudio')
        @continue
        @endif

        <div class="p-4 bg-white rounded-lg shadow hover:shadow-md transition">
            <h2 class="text-lg font-semibold mb-2">{{ str_replace('.blade', '', $item['nombre']) }}</h2>

            <a href="{{ $item['ruta'] }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">
                Abrir
            </a>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center text-gray-600 mt-6">
        No hay plantillas disponibles en esta categoría.
    </p>
    @endif
</div>
@endsection