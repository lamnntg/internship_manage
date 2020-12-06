<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('full_name');
            $table->datetime('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->integer('status');
            $table->char('created_by', 36)->nullable();
            $table->char('updated_by', 36)->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
