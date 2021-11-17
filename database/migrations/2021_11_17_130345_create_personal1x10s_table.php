<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonal1x10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal1p10s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tx_nombres');
            $table->string('tx_apellidos');
            $table->string('cedula')->unique();
            $table->string('telefono');
            $table->string('centro_electoral');
            $table->smallInteger('status')->default(1);
            $table->string('fecha_emisison')->default(date('d/m/Y'));
            $table->foreignId('personal_id')->references('id')->on('personals');
            $table->foreignId('usuario_id')->references('id')->on('users')->default(1);
            $table->foreignId('estado_id')->references('id')->on('estados')->default(1);
            $table->foreignId('municipio_id')->references('id')->on('municipios')->default(1);
            $table->foreignId('parroquia_id')->references('id')->on('parroquias')->default(1);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal1p10s');
    }
}
