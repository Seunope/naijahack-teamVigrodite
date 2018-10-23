<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->tinyInteger('visibility')->default(1);
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('IsOption')->default(0);
            $table->integer('user_id');
            $table->string('slug');
            $table->string('number');
            $table->text('body');
            $table->integer('year_id')->unsigned()->index();
            $table->integer('course_id')->unsigned()->index();
            $table->string('topic');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
