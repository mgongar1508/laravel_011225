@extends('layouts.base')
@section('titulo')
    Inicio Roles
@endsection
@section('cabecera')
    Listado de Roles
@endsection
@section('contenido')
    <div class="flex flex-row-reverse mb-2">
        <a href="{{ route('roles.create') }}" class="p-2 font-bold text-white rounded bg-green-500 hover:bg-green-700">
            <i class="fas fa-add mr-1"></i>NUEVO
        </a>
    </div>
    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">ID</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">NOMBRE</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">COLOR</th>
                <th class="px-4 py-2 text-left font-semibold text-gray-700 border-b">ACCIONES</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($roles as $item)
                <tr class="border-b hover:bg-blue-400">
                    <td class="px-4 py-2">{{ $item->id }}</td>
                    <td class="px-4 py-2">{{ $item->nombre }}</td>
                    <td class="px-4 py-2">
                        <p class="px-3 py-1 rounded text-white font-medium inline-block bg-[{{ $item->color }}]">
                            {{ $item->color }}
                        </p>
                    </td>
                    <td class="px-4 py-2">
                        <form method="POST" action="{{ route('roles.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('roles.edit', $item) }}">
                                <i class="fas fa-edit hover:text-xl mr-2"></i>
                            </a>
                            <button type="submit" onclick="return confirm('¿Borrar definitivamente el Post');">
                                <i class="fas fa-trash hover:text-xl"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('alertas')
<x-mensaje></x-mensaje>
@endsection
