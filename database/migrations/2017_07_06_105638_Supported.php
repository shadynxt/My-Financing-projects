<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Supported extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // people that support project
         Schema::create('supported', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount_of_contribution');
            $table->string('full_name');
            $table->string('profile_pic')->nullable();
            $table->string('email');
            // 1 for active
            $table->integer('active')->default(1);
            $table->integer('idea_project_id')->unsigned();
            $table->foreign('idea_project_id')->references('id')->on('ideas_projects')
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
        Schema::dropIfExists('supported');
    }
}
