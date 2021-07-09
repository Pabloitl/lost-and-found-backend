<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ciudad', function (Blueprint $table) {
            $table->id('pkCiudad');
            $table->string('nombre', 250)->nullable(false);
            $table->string('entidadFederativa', 80)->nullable(false);
            $table->integer('usuarioCreacion')->nullable();
            $table->integer('usuarioActualizacion')->nullable();
            $table->boolean('borrado')->nullable(false);
            $table->timestamp('fechaBorrado')->nullable();
            $table->timestamp('fechaCreacion')->nullable();
            $table->timestamp('fechaActualizacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ciudad');
    }
}
