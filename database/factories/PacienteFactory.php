<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            
			'Nombre' => $this->faker->name,
			'ApellidoPaterno' => $this->faker->name,
			'ApellidoMaterno' => $this->faker->name,
			'Correo' => $this->faker->name,
			'Foto' => $this->faker->name,
        ];
    }
}
