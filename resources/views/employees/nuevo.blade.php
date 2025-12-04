@extends('layouts.base')
@section('titulo')
    Crear empleado
@endsection
@section('cabecera')
    Nuevo Empleado
@endsection
@section('contenido')
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
        <form method="POST" action="{{ route('employees.store') }}">
            @csrf
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-user mr-2"></i>Username
                </label>
                <input type="text" id="username" name="username" placeholder="Tu nombre de usuario" value="{{ @old('username') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <x-pintar-error nombreError="username"></x-pintar-error>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2"></i>Email
                </label>
                <input type="email" id="email" name="email" placeholder="tu@email.com" value="{{ @old('email') }}"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <x-pintar-error nombreError="email"></x-pintar-error>

            <!-- Activo (radio) -->
            <div>
                <span class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-toggle-on mr-2"></i>Activo
                </span>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="activo" value="SI" class="form-radio text-blue-500" @checked( @old('activo')=="SI" )/> 
                        <span class="ml-2">SI</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="activo" value="NO" class="form-radio text-blue-500" @checked( @old('activo')=="NO" )/>
                        <span class="ml-2">NO</span>
                    </label>
                </div>
            </div>
            <x-pintar-error nombreError="activo"></x-pintar-error>

            <!-- Departamento (select) -->
            <div>
                <label for="departament_id" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-building mr-2"></i>Departamento
                </label>
                <select id="departament_id" name="departament_id"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Selecciona un departamento</option>
                    @foreach ($departaments as $item)
                        <option value="{{ $item->id }}" @selected(@old('departament_id')==$item->id)>{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <x-pintar-error nombreError="departament_id"></x-pintar-error>

            <!-- Roles (checkbox) -->
            <div>
                <span class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-user-shield mr-2"></i>Roles
                </span>
                <div class="flex space-x-4">
                    @foreach ($roles as $item)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="roles[]" value="{{ $item->id }}" class="form-checkbox text-blue-500" @checked(in_array($item->id, @old('roles', [])))/>
                            <span class="ml-2">{{$item->nombre}}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <x-pintar-error nombreError="roles"></x-pintar-error>

            <!-- Botones -->
            <div class="flex space-x-4 mt-4">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Enviar
                </button>
                <a href="{{ route('employees.index') }}"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
@section('alertas')
@endsection
