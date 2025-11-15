<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestionar Incidencia') }}
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

                    <form method="POST" action="{{ route('incidencias.update', $incidencia->id) }}">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ $incidencia->titulo }}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Reportado por: <strong>{{ $incidencia->user->name ?? 'N/A' }}</strong> 
                                ({{ $incidencia->user->email ?? 'N/A' }})
                            </p>
                            <p class="mt-1 text-sm text-gray-600">
                                Ubicación: <strong>{{ $incidencia->ubicacion ?? 'No especificada' }}</strong>
                            </p>
                            <p class="mt-2 p-3 bg-gray-50 rounded-md border border-gray-200">
                                {{ $incidencia->descripcion }}
                            </p>
                        </div>
                        
                        <hr class="my-6">

                        <div>
                            <label for="estado" class="block font-medium text-sm text-gray-700">
                                Actualizar Estado
                            </label>
                            <select id="estado" name="estado" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                <option value="pendiente" {{ $incidencia->estado == 'pendiente' ? 'selected' : '' }}>
                                    Pendiente
                                </option>
                                <option value="en_progreso" {{ $incidencia->estado == 'en_progreso' ? 'selected' : '' }}>
                                    En Progreso
                                </option>
                                <option value="resuelto" {{ $incidencia->estado == 'resuelto' ? 'selected' : '' }}>
                                    Resuelto
                                </option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('tareas.index') }}" 
                                class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                                    Cancelar
                            </a>

                            <button type="submit" class="ml-4 inline-flex items-center ...">
                                Actualizar Estado
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>