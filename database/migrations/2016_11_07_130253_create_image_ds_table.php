<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_ds', function (Blueprint $table) {
            $table->increments('id');$table->integer('size');
            $table->string('label');
            $table->string('path');
            $table->string('slug');
            $table->tinyInteger('visibility')->default(1);
            $table->integer('optionD_id');
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
        Schema::drop('image_ds');
    }
}
