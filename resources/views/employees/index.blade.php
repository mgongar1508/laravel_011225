@extends('layouts.base')
@section('titulo')
    Index de empleados
@endsection
@section('cabecera')
    Lista de Empleados
@endsection
@section('contenido')
    <div class="flex flex-row-reverse mb-2">
        <a href="{{ route('employees.create') }}" class="text-white font-bold p-2 rounded-xl bg-green-500 hover:bg-green-600">
            <i class="fas fa-add mr-2"></i>NUEVO
        </a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 bg-white rounded-2xl shadow-md overflow-hidden">
        <thead class=" from-gray-50 to-white">
            <tr>
                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                    Username</th>
                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                    Email</th>
                <th scope="col" class="px-4 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-600">
                    Activo</th>
                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                    Departamento</th>
                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                    Roles</th>
                <th scope="col"
                    class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <!-- Repite/itera este <tr> en tu loop -->
            @foreach ($employees as $item)
            <tr class="hover:bg-gray-50 transition-colors">
                <!-- Username -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center gap-3">
                        <!-- Avatar pequeño (opcional) -->
                        <div
                            class=" h-10 w-10 rounded-full from-indigo-500 to-purple-500 flex items-center justify-center text-white font-medium">
                            A</div>
                        <div class="text-sm font-medium text-gray-900">{{ $item->username }}</div>
                    </div>
                </td>


                <!-- Email -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-600">{{ $item->email }}</div>
                </td>


                <!-- Activo (toggle visual) -->
                <td class="px-4 py-4 whitespace-nowrap text-center">
                    {{ $item->activo }}
                    
                </td>


                <!-- Departamento -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-700">{{ $item->departament->nombre }}</div>
                </td>


                <!-- Roles (lista UL dentro de la celda) -->
                <td class="px-6 py-4 whitespace-nowrap align-top">
                    <ul class="flex flex-wrap gap-2 list-none p-0 m-0">
                    @foreach ($item->roles as $rol)
                        <li>{{$rol->nombre}}</li>
                    @endforeach
                    </ul>
                </td>


                <!-- Acciones -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex items-center justify-end gap-2">
                        <!-- Botón editar -->
                        <form method="POST" action="{{ route('employees.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('employees.edit', $item) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="submit" class="p-2 ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{ $employees->links() }}
    </div>
@endsection
@section('alertas')
<x-mensaje></x-mensaje>
@endsection
