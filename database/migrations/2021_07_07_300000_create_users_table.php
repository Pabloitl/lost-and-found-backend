<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id('pkUsuario');
            $table->string('nombre', 50)->nullable(false);
            $table->string('apellido')->nullable(false);
            $table->string('fotoDePerfil', 100)->nullable();
            $table->string('correoElectronico', 100)->nullable(false);
            $table->string('contrasena', 30)->nullable(false);
            $table->string('nombreDeUsuario', 15)->nullable(false);
            $table->foreignId('fkCarrera')->nullable(false);
            $table->foreignId('fkCampus')->nullable(false);
            $table->integer('usuarioCreacion')->nullable(false);
            $table->integer('usuarioActualizacion')->nullable();
            $table->boolean('borrado')->nullable(false);
            $table->timestamp('fechaBorrado')->nullable();
            $table->timestamp('fechaCreacion')->nullable();
            $table->timestamp('fechaActualizacion')->nullable();
            /* $table->rememberToken(); */

            $table->foreign('fkCarrera')->references('pkCarrera')->on('Carrera');
            $table->foreign('fkCampus')->references('pkCampus')->on('Campus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuario');
    }
}
