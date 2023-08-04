<?php

namespace Database\Factories;

use App\Models\MedicoPaciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoPacienteFactory extends Factory
{
    protected $model = MedicoPaciente::class;
    public function definition()
    {
        $medicoId = \App\Models\Medico::pluck('id')->random();
        $pacienteId = \App\Models\Paciente::pluck('id')->random();

        return [
            'medico_id' => $medicoId,
            'paciente_id' => $pacienteId,
        ];
    }
}
