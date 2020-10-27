<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('test_id')->nullable();
            $table->string('correct')->nullable();
            $table->string('incorrect')->nullable();
            $table->string('total_question')->nullable();
            $table->string('total_attempted')->nullable();
            $table->string('is_attempted')->nullable();
            $table->string('attempt_count')->nullable();
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
        Schema::dropIfExists('quizzes');
    }
}
