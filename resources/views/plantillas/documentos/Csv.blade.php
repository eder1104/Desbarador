@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 mt-10">
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-700">
        Conversor de CSV
    </h1>

    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-xl">
        <p class="text-gray-600 mb-6 text-center">
            Sube tu archivo CSV y selecciona el formato de destino para la conversión.
        </p>

        <form action="{{ route('documentos.show', ['archivo' => 'csv']) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label for="file_csv" class="block text-sm font-medium text-gray-700 mb-2">
                    Seleccionar Archivo CSV:
                </label>
                <input type="file" name="file_csv" id="file_csv" accept=".csv" required
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
                    <option value="xls">Excel</option>
                    <option value="xlsx">Excel (xlsx)</option>
                    <option value="html">HTML</option>
                    <option value="pdf">PDF</option>
                    <option value="txt">TXT</option>
                    <option value="rtf">RTF</option>
                    <option value="doc">Word</option>
                    <option value="docx">Word (docx)</option>
                    <option value="ppt">Powerpoint</option>
                    <option value="pptx">Powerpoint (pptx)</option>
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