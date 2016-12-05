<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            //recept zelf
            $table->increments('id');
            $table->string('titel');
            $table->text('ingredienten');
            $table->text('bereidingswijze');
            $table->text('voedingswaarde');
            //extra
            $table->integer('waardering');
            $table->text('reactie');
            //gelinkt aan user
            $table->integer('allergieen');
            $table->integer('dieet');
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
        Schema::dropIfExists('recipes');
    }
}
