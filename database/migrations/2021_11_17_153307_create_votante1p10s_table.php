<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotante1p10sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votante1p10s', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('ente_id')->references('id')->on('entes');
            $table->foreignId('funcionario_id')->references('id')->on('personals');
            $table->foreignId('personal_p_id')->references('id')->on('personal1p10s');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->smallInteger('confirmed')->nullable()->default(0);
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
        Schema::dropIfExists('votante1p10s');
    }
}
