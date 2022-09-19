<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuestionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacion_v2', function (Blueprint $table) {
            $table->id('situacion_id');
            $table->string('descripcion');
        });
        Schema::create('modalidad_v2', function (Blueprint $table) {
            $table->id('modalidad_id');
            $table->string('descripcion');
            $table->foreignId('situacion_id')->references('situacion_id')->on('situacion_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('grado_v2', function (Blueprint $table) {
            $table->id('grado_id');
            $table->string('descripcion');
            $table->foreignId('modalidad_id')->references('modalidad_id')->on('modalidad_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('periodo_escolar_v2', function (Blueprint $table) {
            $table->id('periodo_escolar_id');
            $table->string('descripcion');
            $table->foreignId('grado_id')->references('grado_id')->on('grado_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('escuela_v2', function (Blueprint $table) {
            $table->id('escuela_id');
            $table->string('descripcion');
            $table->foreignId('grado_id')->references('grado_id')->on('grado_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('plantel_v2', function (Blueprint $table) {
            $table->id('plantel_id');
            $table->string('descripcion');
            $table->foreignId('escuela_id')->references('escuela_id')->on('escuela_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('estado_v2', function (Blueprint $table) {
            $table->id('estado_id');
            $table->string('descripcion');
        });
        Schema::create('delegacion_v2', function (Blueprint $table) {
            $table->id('delegacion_id');
            $table->string('descripcion');
            $table->foreignId('estado_id')->references('estado_id')->on('estado_v2')->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::create('alumno_orientador_v2', function (Blueprint $table) {
            $table->foreignId('usuario_id')->references('usuario_id')->on('usuario_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('situacion_id')->references('situacion_id')->on('situacion_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('modalidad_id')->references('modalidad_id')->on('modalidad_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('grado_id')->references('grado_id')->on('grado_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('periodo_escolar_id')->references('periodo_escolar_id')->on('periodo_escolar_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('escuela_id')->references('escuela_id')->on('escuela_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('plantel_id')->references('plantel_id')->on('plantel_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('estado_id')->references('estado_id')->on('estado_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('delegacion_id')->references('delegacion_id')->on('delegacion_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->tinyInteger('alumno_orientador');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('situacion_v2');
        Schema::dropIfExists('modalidad_v2');
        Schema::dropIfExists('grado_v2');
        Schema::dropIfExists('periodo_escolar_v2');
        Schema::dropIfExists('escuela_v2');
        Schema::dropIfExists('plantel_v2');
        Schema::dropIfExists('estado_v2');
        Schema::dropIfExists('delegacion_v2');
        Schema::dropIfExists('alumno_orientador_v2');
    }
}
