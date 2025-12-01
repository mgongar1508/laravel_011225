@extends('layouts.base')
@section('titulo')
    Roles Index
@endsection
@section('cabecera')
    Roles
@endsection
@section('contenido')
    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">ID</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nombre</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Color</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as  $role)
            <!-- Fila para iterar -->
            <tr class="border-t hover:bg-blue-500">
                <td class="px-4 py-2 text-sm text-gray-800">{{ $role->id }}</td>

                <td class="px-4 py-2 text-sm text-gray-800">{{ $role->nombre }}</td>

                <td class="px-4 py-2">
                    <p class="px-3 py-1 rounded-lg text-white text-sm font-medium"
                        style="background-color: {{ $role->color }};">
                        {{ $role->color }}
                    </p>
                </td>

                <td class="px-4 py-2">
                    <!-- Acciones -->
                    <button class="px-3 py-1 bg-blue-600 text-white rounded-md text-sm">
                        Editar
                    </button>
                    <button class="px-3 py-1 bg-red-600 text-white rounded-md text-sm ml-2">
                        Eliminar
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('alertas')
@endsection
