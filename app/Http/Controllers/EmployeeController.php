<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with("departament", "roles")->orderBy('id', 'desc')->paginate(10);
        return view("employees.index", compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departaments = Departament::select('nombre', 'id')->orderBy('nombre')->get();
        $roles = Role::select('nombre', 'id')->orderBy('nombre')->get();
        return view("employees.nuevo", compact("departaments", "roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::validar());
        $employee = Employee::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'activo'=>$request->activo,
            'departament_id'=> $request->departament_id
        ]);

        $employee->roles()->attach($request->roles);
        return redirect()->route('employees.index')->with('mensaje', "Empleado creado exitosamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departaments = Departament::select('nombre', 'id')->orderBy('nombre')->get();
        $roles = Role::select('nombre', 'id')->orderBy('nombre')->get();
        //$arrayConRoles = $employee->roles->pluck('id')->toArray();
        $arrayRoles = $employee->getRoles();
        return view('employees.editar', compact('employee', 'departaments', 'roles', 'arrayRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(self::validar($employee->id));
         $employee = Employee::update([
            'username'=>$request->username,
            'email'=>$request->email,
            'activo'=>$request->activo,
            'departament_id'=> $request->departament_id
        ]);
        
        $employee->roles()->sync($request->roles);
        return redirect()->route("employees.index")->with('mensaje', "actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route("employees.index")->with('mensaje', "borrado");
    }

    private static function validar(?int $id = null){
        return [
            'username'=>['required', 'string', 'min:3', 'max:50'. 'unique:employee.username'.$id],
            'email'=>['required', 'email', 'unique:employee.email'],
            'activo'=>['required', 'in:SI,NO'],
            'departament_id'=>['required', 'exists:departaments.id'],
            'roles'=>['required', 'array', 'exists:roles.id']
        ];
    }
}
