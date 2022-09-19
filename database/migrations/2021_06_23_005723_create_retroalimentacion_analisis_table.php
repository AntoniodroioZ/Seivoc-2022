<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetroalimentacionAnalisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_v2', function (Blueprint $table) {
            $table->id('grupo_id');
            $table->string('nombre');
        });
        Schema::create('escala_v2', function (Blueprint $table) {
            $table->id('escala_id');
            $table->string('nombre');
        });
        Schema::create('mapeo_escalas_grupo_v2', function (Blueprint $table) {
            $table->integer('ss');
            $table->integer('ep');
            $table->integer('v');
            $table->integer('ap');
            $table->integer('ms');
            $table->integer('og');
            $table->integer('ct');
            $table->integer('cl');
            $table->integer('mc');
            $table->integer('al');
            $table->foreignId('grupo_id')->references('grupo_id')->on('grupo_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('porcentaje_grupo_escalas_v2', function (Blueprint $table) {
            $table->foreignId('escala_id')->references('escala_id')->on('escala_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('grupo_id')->references('grupo_id')->on('grupo_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->integer('porcentaje_min');
            $table->integer('porcentaje_max');
        });
        Schema::create('pregunta_v2', function (Blueprint $table) {
            $table->id('pregunta_id');
            $table->string('descripcion');
        });
        Schema::create('grupo_escala_pregunta_v2', function (Blueprint $table) {
            $table->foreignId('escala_id')->references('escala_id')->on('escala_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('grupo_id')->references('grupo_id')->on('grupo_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('pregunta_id')->references('pregunta_id')->on('pregunta_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('material_v2', function (Blueprint $table) {
            $table->id('material_id');
            $table->string('nombre');
            $table->string('urlvideo');
            $table->string('urlimagen');
            $table->string('urlpdf');
        });
        Schema::create('retroalimentacion_v2', function (Blueprint $table) {
            $table->id('retro_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('tipo');
            $table->string('expmateriales');
            $table->string('carreras');
            $table->string('introduccion');
            $table->foreignId('material_id')->references('material_id')->on('material_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('cuestionario_v2', function (Blueprint $table) {
            $table->id('cuestionario_id');
            $table->foreignId('usuario_id')->references('usuario_id')->on('usuario_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->string('fecha_creacion');
            $table->foreignId('retro_id')->references('retro_id')->on('retroalimentacion_v2')->onDelete("cascade")->onUpdate("cascade");
        });
        Schema::create('cuestionario_pregunta_v2', function (Blueprint $table) {
            $table->foreignId('cuestionario_id')->references('cuestionario_id')->on('cuestionario_v2')->onDelete("cascade")->onUpdate("cascade");
            $table->integer('valor');
            $table->foreignId('pregunta_id')->references('pregunta_id')->on('pregunta_v2')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_v2');
        Schema::dropIfExists('escala_v2');
        Schema::dropIfExists('mapeo_escalas_grupo_v2');
        Schema::dropIfExists('escala_v2');
        Schema::dropIfExists('pregunta_v2');
        Schema::dropIfExists('grupo_escala_pregunta_v2');
        Schema::dropIfExists('material_v2');
        Schema::dropIfExists('retroalimentacion_v2');
        Schema::dropIfExists('cuestionario_v2');
        Schema::dropIfExists('cuestionario_pregunta_v2');
    }
}
