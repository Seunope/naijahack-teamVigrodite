<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_cs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('user_id');
            $table->tinyInteger('visibility')->default(1);
            $table->tinyInteger('edited')->default(0);
            $table->text('body');
            $table->integer('question_id')->unsigned()->index();
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
        Schema::drop('option_cs');
    }
}
