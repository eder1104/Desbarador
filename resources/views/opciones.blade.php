@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Formatos Disponibles</h1>

    <div class="row justify-content-center">
        @foreach ($categorias as $categoria => $formatos)
        <div class="col-md-5 col-lg-4 mb-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <h4 class="card-title mb-3">{{ $categoria }}</h4>

                    @foreach ($formatos as $formato)
                    <a href="{{ url(strtolower($categoria) . '/' . strtolower($formato)) }}"
                        class="btn btn-outline-primary m-1 px-4 py-2">
                        {{ $formato }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection