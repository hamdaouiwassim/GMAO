<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdreInterventionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ointerventions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero');
            $table->integer('emetteur');
            $table->integer('idmachine');
            $table->string('type_panne');
            $table->string('priorite');
            $table->integer('destinateur');
            $table->text('commentaire')->nullable();
            $table->text('observation')->nullable();
            $table->datetime('date_intervention')->nullable();
            $table->datetime('date_fin_intervention')->nullable();
            $table->string('etat');
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
