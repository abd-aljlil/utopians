<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamNameIndexQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_name_index_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_name_index_id');
            $table->text('text');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->string('answer4');
            $table->string('correct_answer');
            $table->StatusControls();
            $table->timestamps();
            $table->UserControls();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_name_index_questions');
    }
}
