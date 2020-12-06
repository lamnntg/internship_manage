<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->char('id', 36)->primary();
            $table->unsignedBigInteger('question_category_id');
            $table->unsignedBigInteger('question_degree_id');
            $table->text('question');
            $table->string('media_url')->nullable();
            $table->bigInteger('answer_type')->nullable();
            $table->tinyInteger('check_point_flg')->nullable();
            $table->tinyInteger('interview_flg')->nullable();
            $table->char('created_by', 36)->nullable();
            $table->char('updated_by', 36)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
