@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-10">
    <div class="max-w-lg mx-auto p-8 bg-yellow-100 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-bold mb-4" style="color: #FFD700;">⚠ Próximamente ⚠</h1>
        <p class="text-lg mb-4" style="color: #005AA7;">
            La sección de hojas de cálculo está en desarrollo.
            Muy pronto podrás crear y convertir tus archivos de manera segura.
        </p>
        <div class="flex justify-center gap-2">
            <span class="w-6 h-6 rounded-full" style="background-color: #FFD700;"></span>
            <span class="w-6 h-6 rounded-full" style="background-color: #005AA7;"></span>
            <span class="w-6 h-6 rounded-full" style="background-color: #EF3340;"></span>
        </div>
    </div>
</div>
@endsection