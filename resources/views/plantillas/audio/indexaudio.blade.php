@extends('layouts.app')

@section('content')
<div x-data="{ 
    formatoSeleccionado: null,
    nombreSeleccionado: 'Formato',
    archivosDisponibles: @json($plantillas) 
}" class="container mx-auto px-4 mt-12">

    <h1 class="text-4xl font-extrabold text-center mb-10 text-gray-800 tracking-tight">
        {{ ucfirst($categoria) }} | Conversor Único
    </h1>

    <div class="max-w-4xl mx-auto p-8 bg-white/80 backdrop-blur-md border border-gray-200 rounded-2xl shadow-xl">

        <div x-show="!formatoSeleccionado" class="transition duration-300">

            <p class="text-gray-600 mb-6 text-center text-lg">
                Selecciona el formato de origen que deseas convertir:
            </p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                @foreach ($plantillas as $item)
                <button 
                    @click="formatoSeleccionado = '{{ $item['archivo'] }}'; nombreSeleccionado = '{{ $item['nombre'] }}'" 
                    :class="formatoSeleccionado === '{{ $item['archivo'] }}' 
                        ? 'bg-blue-600 text-white shadow-lg scale-105' 
                        : 'bg-gradient-to-br from-blue-50 to-blue-100 text-gray-700'"
                    class="p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition font-semibold 
                           hover:text-blue-700 hover:-translate-y-1 duration-200 text-center">
                    {{ $item['nombre'] }}
                </button>
                @endforeach
            </div>

            @if (empty($plantillas))
                <p class="text-center text-red-500 mt-8 font-medium">
                    No se encontraron archivos de formato en la carpeta.
                </p>
            @endif
        </div>

        <div x-show="formatoSeleccionado" x-cloak class="transition duration-300">

            <button @click="formatoSeleccionado = null"
                class="mt-6 mb-10 inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 text-gray-700 
                       border border-gray-300 hover:bg-gray-200 hover:shadow-sm transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Cambiar Formato
            </button>

            <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">
                Convertir: <span x-text="nombreSeleccionado" class="text-blue-600"></span>
            </h2>

            <p class="text-gray-500 mb-8 text-center">
                Sube tu archivo y selecciona el formato de destino.
            </p>

            <form :action="`{{ route('plantilla.convertir', ['categoria' => $categoria]) }}`" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <input type="hidden" name="formato_origen" :value="formatoSeleccionado">

                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Seleccionar archivo <span x-text="nombreSeleccionado"></span>
                    </label>

                    <input type="file" name="audio_file" :accept="'.' + formatoSeleccionado" required
                        class="block w-full cursor-pointer text-sm text-gray-600 
                               file:bg-blue-600 file:hover:bg-blue-700 file:text-white
                               file:border-0 file:px-5 file:py-2 file:rounded-lg 
                               file:font-medium shadow-sm" />
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Formato de destino
                    </label>

                    <select name="target_format" required
                        class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-lg 
                               shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                               transition text-gray-700">

                        <option value="">-- Selecciona un formato --</option>

                        <template x-for="item in archivosDisponibles" :key="item.archivo">
                            <option 
                                :value="item.archivo"
                                x-text="item.nombre"
                                :disabled="item.archivo === formatoSeleccionado">
                            </option>
                        </template>

                    </select>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-3 text-lg rounded-xl font-semibold text-white 
                               bg-blue-600 hover:bg-blue-700 
                               transition shadow-md hover:shadow-xl hover:-translate-y-1 duration-200">
                        Convertir Archivo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
