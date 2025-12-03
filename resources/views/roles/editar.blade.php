@extends('layouts.base')
@section('titulo')
    Editar Rol
@endsection
@section('cabecera')
    Editar Rol
@endsection
@section('contenido')
    <form method="POST" action="{{ route('roles.update', $role) }}"
        class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 space-y-5">
        @csrf
        @method('PUT')
        <!-- Campo Nombre -->
        <div class="flex flex-col">
            <label for="nombre" class="text-sm font-semibold text-gray-700 mb-1">
                <i class="fa-solid fa-user mr-1"></i> Nombre
            </label>
            <input id="nombre" name="nombre" type="text" value="{{ @old('nombre', $role->nombre) }}"
                class="w-full rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-400 transition px-3 py-2"
                placeholder="Ingresa tu nombre" />
            <x-pintar-error nombreError="nombre" />
        </div>

        <!-- Campo Color -->
        <div class="flex flex-col">
            <label for="color" class="text-sm font-semibold text-gray-700 mb-1">
                <i class="fa-solid fa-palette mr-1"></i> Color
            </label>
            <input id="color" name="color" type="color" value="{{ @old('color', $role->color) }}"
                class="h-12 w-full rounded-lg cursor-pointer border border-gray-300" />
            <x-pintar-error nombreError="color" />
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between pt-2">
            <button type="submit"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg transition">
                <i class="fa-solid fa-paper-plane"></i>
                Enviar
            </button>

            <a href="{{ route('roles.index') }}"
                class="flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-5 py-2 rounded-lg transition">
                <i class="fa-solid fa-xmark"></i>
                Cancelar
            </a>
        </div>

    </form>
@endsection
