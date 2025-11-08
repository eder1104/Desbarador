@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-10">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">
        Conversor de Word
    </h1>

    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-xl">
        <p class="text-gray-600 mb-6 text-center">
            Sube tu archivo Word y selecciona el formato de destino para la conversión.
        </p>

        <form action="{{ route('documentos.convert.convertIndex', ['formato_origen' => 'word']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="document_file" class="block text-sm font-medium text-gray-700 mb-2">
                    Seleccionar Archivo Word:
                </label>
                <input type="file" name="document_file" id="document_file" accept=".doc,.docx" required
                    class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700
                           hover:file:bg-blue-100" />
            </div>

            <div class="mb-5">
                <label for="target_format" class="block text-sm font-medium text-gray-700 mb-2">
                    Formato de Destino:
                </label>
                <select name="target_format" id="target_format" required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">-- Selecciona un formato --</option>
                    <option value="csv">CSV</option>
                    <option value="excel">Excel</option>
                    <option value="html">HTML</option>
                    <option value="pdf">PDF</option>
                    <option value="powerpoint">Powerpoint</option>
                    <option value="rtf">RTF</option>
                    <option value="txt">TXT</option>
                </select>
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Convertir Archivo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection