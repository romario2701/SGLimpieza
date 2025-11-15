<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Tarea de Limpieza') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('¡Ups! Algo salió mal.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('tareas.store') }}">
                        @csrf <div>
                            <label for="titulo" class="block font-medium text-sm text-gray-700">Título</label>
                            <input id="titulo" name="titulo" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required autofocus>
                        </div>

                        <div class="mt-4">
                            <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300"></textarea>
                        </div>

                        <div class="mt-4">
                            <label for="prioridad" class="block font-medium text-sm text-gray-700">Prioridad</label>
                            <select id="prioridad" name="prioridad" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                <option value="seleccione">Seleccione</option>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="personal_id" class="block font-medium text-sm text-gray-700">
                                Asignar a Personal
                            </label>
                            <select id="personal_id" name="personal_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">

                                <option value="">Sin Asignar</option>

                                @foreach($personalDisponible as $personal)
                                    <option value="{{ $personal->id }}" {{ old('personal_id') == $personal->id ? 'selected' : '' }}>
                                        {{ $personal->name }} ({{ $personal->email }})
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('tareas.index') }}" 
                                class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                                    Cancelar
                            </a>

                            <button type="submit" class="ml-4 inline-flex items-center ...">
                                Guardar Tarea
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>