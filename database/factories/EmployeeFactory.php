<?php

namespace Database\Factories;

use App\Models\Departament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $username = fake()->unique()->userName();
        $departamentos = Departament::all();
        return [
            'username'=>$username,
            'email'=>$username."@".fake()->freeEmailDomain(),
            'activo'=>fake()->randomElement(['SI', 'NO']),
            'departament_id'=>$departamentos->random()->id
        ];
    }
}
