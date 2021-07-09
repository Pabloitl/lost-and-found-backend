<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Campus', function (Blueprint $table) {
            $table->id('pkCampus');
            $table->string('nombre', 250)->nullable(false);
            $table->foreignId('fkCiudad')->nullable(false);
            $table->integer('usuarioCreacion');
            $table->integer('usuarioActualizacion');
            $table->boolean('borrado')->nullable(false);
            $table->timestamp('fechaBorrado')->nullable();
            $table->timestamp('fechaCreacion')->nullable();
            $table->timestamp('fechaActualizacion')->nullable();

            $table->foreign('fkCiudad')->references('pkCiudad')->on('Ciudad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Campus');
    }
}
