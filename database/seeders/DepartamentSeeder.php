<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            "Amazonas"      => "#1abc9c",
            "Áncash"        => "#3498db",
            "Apurímac"      => "#9b59b6",
            "Arequipa"      => "#e74c3c",
            "Ayacucho"      => "#f1c40f",
        ];

        foreach($departamentos as $nombre=>$color){
            Departament::create(compact('nombre', 'color'));
        }
    }
}
