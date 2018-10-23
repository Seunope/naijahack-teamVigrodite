<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageBsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_bs', function (Blueprint $table) {
            $table->increments('id');$table->integer('size');
            $table->string('label');
            $table->string('path');
            $table->string('slug');
            $table->tinyInteger('visibility')->default(1);
            $table->integer('optionB_id');
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
        Schema::drop('image_bs');
    }
}
