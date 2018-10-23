<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cimages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('size');
            $table->string('path');
            $table->string('slug');
            $table->string('label');
            $table->tinyInteger('visibility')->default(1);
            $table->integer('comment_id');
            $table->integer('user_id');
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
        Schema::drop('cimages');
    }
}
