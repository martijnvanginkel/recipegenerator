<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodrestrictionRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodrestriction_recipe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foodrestriction_id')->unsigned();
            $table->foreign('foodrestriction_id')->references('id')->on('foodrestrictions')->onDelete('cascade');

            $table->integer('recipe_id')->unsigned();
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodrestriction_recipe');
    }
}
