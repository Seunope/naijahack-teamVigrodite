<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('title');
            $table->tinyInteger('visibility')->default(1);
            $table->tinyInteger('type')->default(0);
            $table->string('slug');
            $table->integer('unit');
            $table->integer('user_id');
            $table->integer('department_id')->unsigned()->index();
            $table->integer('semester_id')->unsigned()->index();
            $table->integer('level_id')->unsigned()->index();
            $table->timestamps();

//            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
