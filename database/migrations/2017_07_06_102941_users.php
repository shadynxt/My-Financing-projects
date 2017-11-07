<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('token')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->double('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('profile_pic')->nullable();
            $table->string('about_you')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link')->nullable();
            // 1 that mean active user
            $table->string('active')->default(0);
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
        Schema::drop('users');
    }
}
