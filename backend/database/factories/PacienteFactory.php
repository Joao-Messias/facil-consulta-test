<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'celular' => $this->faker->numerify('###########'),
        ];
    }
}
