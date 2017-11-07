<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ideas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ideas_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('idea');
            $table->string('budget');
            $table->string('link');
            $table->string('basic_image');
            $table->string('additional_photos')->nullable();
            $table->string('video')->nullable();
            $table->double('views')->nullable();
            $table->dateTime('expected_date');
            // All That is Assign to Another field in database
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade')->onUpdate('cascade');
             $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
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
         Schema::dropIfExists('ideas_projects');
    }
}
