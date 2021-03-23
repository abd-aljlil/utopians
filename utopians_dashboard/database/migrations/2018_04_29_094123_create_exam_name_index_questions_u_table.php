<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamNameIndexQuestionsUTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_name_index_questions_u', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_name_index_questions_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('answer');
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
        Schema::dropIfExists('exam_name_index_questions_u');
    }
}
