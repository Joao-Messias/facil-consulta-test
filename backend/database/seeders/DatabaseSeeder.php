<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserFactory::new()->create();
        Cidade::factory(10)->create();
        Medico::factory(10)->create();
        Paciente::factory(20)->create();
        MedicoPaciente::factory(20)->create();
    }
}
