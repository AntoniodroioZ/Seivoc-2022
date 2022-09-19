<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_v2', function (Blueprint $table) {
            $table->id('usuario_id');
            $table->string('alias');
            $table->string('password');
            $table->string('hash');
            $table->tinyInteger('activo');
            $table->tinyInteger('edad');
            $table->integer('status_id');
            $table->tinyInteger('sexo');
            $table->dateTime('fecha_creacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_v2');
    }
    
}

