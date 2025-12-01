<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'Administrador' => '#1abc9c',
            'Supervisor' => '#3498db',
            'Operario' => '#e67e22',
            'Becario' => '#9b59b6',
        ];

        foreach ($roles as $nombre => $color) {
            Role::create(compact('nombre', 'color'));
        }
    }
}
