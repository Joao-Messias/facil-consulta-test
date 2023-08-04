<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_paciente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('medico_id')->references('id')->on('medico');
            $table->foreign('paciente_id')->references('id')->on('paciente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico_paciente');
    }
}
