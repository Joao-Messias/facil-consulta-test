<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->string('especialidade', 100);
            $table->unsignedBigInteger('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
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
        Schema::dropIfExists('medico');
    }
}
