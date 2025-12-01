<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = Employee::factory(100)->create();
        foreach($empleados as $empleado){
            $empleado->roles()->attach(self::getIdRolesRandom());
        }
    }

    private static function getIdRolesRandom(){
        $allId = Role::pluck('id')->toArray();
        shuffle($allId);
        return array_splice($allId, 0, random_int(1, count($allId)));
        
    }
}
