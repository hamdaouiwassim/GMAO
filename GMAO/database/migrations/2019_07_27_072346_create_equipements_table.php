<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('equipements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('modele')->unique();
            $table->string('marque');
            $table->string('numero');
            $table->string('emplacement');
            $table->string('photo');
            $table->text('description');
            $table->string('document');
            $table->rememberToken();
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
        Schema::dropIfExists('equipements');
    }
}
