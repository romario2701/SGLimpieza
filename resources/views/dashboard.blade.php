<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SISTEMA DE GESTION DE BASURA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    @if(auth()->user()->role == 'admin')
        <h3 class="text-lg font-medium text-gray-900">Panel de Administrador</h3>
    @elseif(auth()->user()->role == 'personal')
        <h3 class="text-lg font-medium text-gray-900">Panel de Tareas</h3>
    @else
        <h3 class="text-lg font-medium text-gray-900">Portal del Ciudadano</h3>
    @endif
    
    <p class="mt-1 text-sm text-gray-600">
        Bienvenido, {{ auth()->user()->name }}. Selecciona una opción.
    </p>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        @if(auth()->user()->role == 'admin')
            
            <a href="{{ route('tareas.index') }}" 
               class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Gestión de Tareas</h5>
                <p class="font-normal text-gray-700">Crear, editar y asignar todas las tareas.</p>
            </a>

            <a href="{{ route('users.index') }}" 
               class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Gestión de Usuarios</h5>
                <p class="font-normal text-gray-700">Administrar roles y cuentas del sistema.</p>
            </a>

            <a href="{{ route('incidencias.index') }}" 
           class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
            <h5 class="mb-2 text-2xl font-bold text-gray-900">Gestión de Incidencias</h5>
            <p class="font-normal text-gray-700">Ver, gestionar y resolver los reportes de los ciudadanos.</p>
            </a>
        
        @elseif(auth()->user()->role == 'personal')
            
            <a href="{{ route('tareas.index') }}"  {{-- (Eventualmente, esto apuntará a una ruta filtrada) --}}
               class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Mis Tareas Asignadas</h5>
                <p class="font-normal text-gray-700">Ver y marcar como completadas mis tareas.</p>
            </a>
        
        @elseif(auth()->user()->role == 'ciudadano')
            @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                @endif

             <a href="{{ route('incidencias.create') }}" 
               class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
                <h5 class="mb-2 text-2xl font-bold text-gray-900">Reportar Incidencia</h5>
                <p class="font-normal text-gray-700">Crear un nuevo reporte o queja sobre la limpieza.</p>
            </a>
            
        @endif

    </div>
    </div>
</x-app-layout>
