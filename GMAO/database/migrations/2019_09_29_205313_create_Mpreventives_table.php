<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpreventivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mpreventives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->string('umesure');
            $table->integer('emetteur');
            $table->integer('idmachine');
            $table->string('intervalle');
            $table->integer('executeur');
            $table->string('etat');
            $table->date('date_prochaine')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
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
        //
    }
}
