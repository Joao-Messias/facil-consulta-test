<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'especialidade' => $this->faker->jobTitle,
            'cidade_id' => function () {
                return \App\Models\Cidade::pluck('id')->random();
            },
        ];
    }
}
