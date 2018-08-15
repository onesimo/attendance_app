<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_user', function (Blueprint $table) {

            $table->integer('user_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(array('grade_id','user_id'));

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_user');
    }
}
