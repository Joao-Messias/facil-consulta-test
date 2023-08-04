<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    protected $model = Cidade::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->city,
            'estado' => $this->faker->state,
        ];
    }
}
