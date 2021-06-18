<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable()->default(null);
            $table->unsignedInteger('views')->default(0); //how many times the question is viewed.
            $table->unsignedInteger('answers')->default(0); //how many question  the answer has.
            $table->integer('votes')->default(0);
            $table->unsignedInteger('best_answer_id')->nullable(); //recorded the accepted or answr id
            $table->unsignedInteger('user_id'); //track of the user that create the question
            $table->string('image')->nullable()->default(null);
            $table->integer('created_by')->unsigned()->nullable()->default(null);
            $table->integer('updated_by')->unsigned()->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
