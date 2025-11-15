<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}: {{ $user->name }}
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

                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT') <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Nombre</label>
                            <input id="name" name="name" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" 
                                   value="{{ old('name', $user->name) }}" required autofocus>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" 
                                   value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="mt-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">Rol</label>
                            <select id="role" name="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                                <option value="seleccione">Seleccione</option>
                                <option value="ciudadano" {{ $user->role == 'ciudadano' ? 'selected' : '' }}>Ciudadano</option>
                                <option value="personal" {{ $user->role == 'personal' ? 'selected' : '' }}>Personal</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                           <a href="{{ route('users.index') }}" 
                                class="px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                                    Cancelar
                            </a>

                        <button type="submit" class="ml-4 inline-flex items-center ...">
                            Actualizar Usuario
                        </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>