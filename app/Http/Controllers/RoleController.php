<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('nombre')->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::misValidaciones());
        Role::create($request->all());

        return redirect()->route('roles.index')->with('mensaje', 'Se ha creado un rol nuevo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.editar', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate(self::misValidaciones($role->id));
        $role->update($request->all());

        return redirect()->route('roles.index')->with('mensaje', 'Rol Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('mensaje', 'Rol elimindo definitivamente');
    }

    private static function misValidaciones(?int $id = null): array
    {
        return [
            'nombre' => ['required', 'string', 'min:3', 'max:25', 'unique:roles,nombre,'.$id],
            'color' => ['required', 'color'],
        ];
    }
}
