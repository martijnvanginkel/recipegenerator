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
            $table->text('ingredienten')->default(NULL);
            $table->text('bereidingswijze');
            $table->text('energie');
            $table->text('eiwit');
            $table->text('koolhydraten');
            $table->text('vet');
            $table->text('voedingsvezel');
            $table->text('natrium');
            //gelinkt aan user
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
