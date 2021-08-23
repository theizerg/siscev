<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votantes', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('gerencia_id')->references('id')->on('gerencias');
            $table->foreignId('personal_id')->references('id')->on('personals');
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
        Schema::dropIfExists('votantes');
    }
}
