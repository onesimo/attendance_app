<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('start_time');
            $table->string('finish_time');
            $table->integer('professor_id')->deafault(0);
            $table->softDeletes();
            $table->timestamps();

            //$table->foreign('professor_id')->references('id')->on('users');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
