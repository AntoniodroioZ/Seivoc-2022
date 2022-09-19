<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasEvaluacionV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntae_v2', function (Blueprint $table) {
            $table->id('preguntaE_id');
            $table->string('descripcion');
        });
        Schema::create('respuestae_v2', function (Blueprint $table) {
            $table->id('respuestaE_id');
            $table->string('descripcion');
            $table->foreignId('preguntaE_id')->references('preguntaE_id')->on('preguntae_v2')->onDelete("cascade")->onUpdate("cascade");           
        });
        Schema::create('preguntas_evaluacion_v2', function (Blueprint $table) {
            $table->foreignId('usuario_id')->references('usuario_id')->on('usuario_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('preguntaE_id')->references('preguntaE_id')->on('preguntae_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('respuestaE_id')->references('respuestaE_id')->on('respuestae_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntae_v2');
        Schema::dropIfExists('respuestae_v2');
        Schema::dropIfExists('_preguntas__evaluacion_v2');
    }
}
