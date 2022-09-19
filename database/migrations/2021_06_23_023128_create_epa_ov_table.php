<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpaOvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acerca_seivoc', function (Blueprint $table) {
            $table->integer('organigrama');
            $table->string('creditos');
        });
        Schema::create('infografias_et', function (Blueprint $table) {
            $table->id('id_infografias');
            $table->string('eje_tematico');
        });
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id('id_convocatorias');
            $table->string('calendario');
        });
        Schema::create('conferencias', function (Blueprint $table) {
            $table->id('id_conferencias');
            $table->string('conferenciascol');
        });
        Schema::create('recursos_apoyo', function (Blueprint $table) {
            $table->id('id_recursos_apoyo');
            $table->string('titulo');
            $table->string('texto');
            $table->string('imagen');
        });
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_servicios');
            $table->string('titulo');
            $table->string('texto');
            $table->string('imagen');
            $table->string('servicioscol');
        });
        Schema::create('tema_i', function (Blueprint $table) {
            $table->foreignId('id_infografias')->references('id_infografias')->on('infografias_et')->onDelete("cascade")->onUpdate("cascade");
            $table->string('titulo');
            $table->string('imagen');
            $table->string('texto');
        });
        Schema::create('colores', function (Blueprint $table) {
            $table->id('id_colores');
            $table->string('color');
            $table->string('descripcion');
        });
        Schema::create('convocatorias_tabla', function (Blueprint $table) {
            $table->foreignId('id_convocatorias')->references('id_convocatorias')->on('convocatorias')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('id_colores')->references('id_colores')->on('colores')->onDelete("cascade")->onUpdate("cascade");
            $table->string('siglas');
            $table->string('nombre');
            $table->string('convocatoria');
        });
        Schema::create('titulo_conferencias', function (Blueprint $table) {
            $table->foreignId('id_conferencias')->references('id_conferencias')->on('conferencias')->onDelete("cascade")->onUpdate("cascade");
            $table->string('titulo');
            $table->string('texto');
            $table->string('enlace');
        });
        Schema::create('mes_convocatorias', function (Blueprint $table) {
            $table->id('id_mes_convocatoria');
            $table->string('mes');
        });
        Schema::create('escuelas', function (Blueprint $table) {
            $table->id('id_escuela');
            $table->string('nombre');
            $table->string('siglas');
        });
        Schema::create('convocatoria_escuela', function (Blueprint $table) {
            $table->foreignId('id_escuela')->references('id_escuela')->on('escuelas')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('id_mes_convocatoria')->references('id_mes_convocatoria')->on('mes_convocatorias')->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('id_colores')->references('id_colores')->on('colores')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('convocatoria_escuela');
        Schema::dropIfExists('escuelas');
        Schema::dropIfExists('mes_convocatorias');
        Schema::dropIfExists('titulo_conferencias');
        Schema::dropIfExists('convocatorias_tabla');
        Schema::dropIfExists('colores');
        Schema::dropIfExists('tema_i');
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('recursos_apoyo');
        Schema::dropIfExists('conferencias');
        Schema::dropIfExists('convocatorias');
        Schema::dropIfExists('infografias_et');
        Schema::dropIfExists('acerca_seivoc');
        
    }
}
