<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metoos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('comment_id')->unsigned()->index();
            $table->integer('host_id')->unsigned()->index();
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
        Schema::drop('metoos');
    }
}
