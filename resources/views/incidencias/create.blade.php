<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportar Nueva Incidencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('incidencias.store') }}">
                        @csrf 

                        <div>
                            <label for="titulo" class="block font-medium text-sm text-gray-700">Título</label>
                            <input id="titulo" name="titulo" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('titulo') }}" required autofocus>
                        </div>

                        <div class="mt-4">
                            <label for="ubicacion" class="block font-medium text-sm text-gray-700">Ubicación (Ej. Pasillo, local, etc.)</label>
                            <input id="ubicacion" name="ubicacion" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" value="{{ old('ubicacion') }}">
                        </div>

                        <div class="mt-4">
                            <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="5" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('incidencias.index') }}" 
                                class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                                    Cancelar
                            </a>

                            <button type="submit" class="ml-4 inline-flex items-center ...">
                                Guardar Reporte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>