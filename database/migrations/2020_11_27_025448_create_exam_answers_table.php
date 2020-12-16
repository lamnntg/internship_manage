<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('exam_question_id', 36);
            $table->text('answer')->nullable();
            $table->string('media_url', 255)->nullable();
            $table->tinyInteger('correct_flag')->nullable();
            $table->tinyInteger('selected_flg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_answers');
    }
}
