<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodrestrictionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('foodrestriction_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foodrestriction_id')->unsigned();
            $table->foreign('foodrestriction_id')->references('id')->on('foodrestrictions')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodrestriction_user');
    }
}
