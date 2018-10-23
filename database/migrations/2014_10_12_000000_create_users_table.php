<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('name');
            $table->tinyInteger('visibility')->default(1);
            $table->integer('level_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('credit_id')->unsigned()->index();
            $table->integer('phone_id')->unsigned()->index();
            $table->integer('path')->unsigned()->index();
            $table->integer('role_id')->unsigned()->index();
            $table->integer('school_id')->unsigned()->index();
            $table->string('email')->unique();
            $table->string('slug');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

//            $table->foreign('credit_id')->references('id')->on('credits')->onDelete('cascade');
//            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');
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
