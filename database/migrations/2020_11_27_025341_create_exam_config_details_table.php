<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamConfigDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_config_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_config_id');
            $table->unsignedBigInteger('question_category_id');
            $table->unsignedBigInteger('question_degree_id')->nullable();
            $table->integer('quota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_config_details');
    }
}
