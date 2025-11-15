<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualizar Estado de Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('tareas.updateStatus', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <h3 class="text-lg font-medium text-gray-900">{{ $task->titulo }}</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Prioridad: <strong>{{ $task->prioridad }}</strong>
                            </p>
                            <p class="mt-2 p-3 bg-gray-50 rounded-md border border-gray-200">
                                {{ $task->descripcion }}
                            </p>
                        </div>
                        
                        <hr class="my-6">

                        <div>
                            <label for="estado" class="block font-medium text-sm text-gray-700">
                                Actualizar Estado
                            </label>
                            <select id="estado" name="estado" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                <option value="pendiente" {{ $task->estado == 'pendiente' ? 'selected' : '' }}>
                                    Pendiente
                                </option>
                                <option value="en_progreso" {{ $task->estado == 'en_progreso' ? 'selected' : '' }}>
                                    En Progreso
                                </option>
                                <option value="completada" {{ $task->estado == 'completada' ? 'selected' : '' }}>
                                    Completada
                                </option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Actualizar Estado
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>