<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamNameIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_name_index', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_name_id')->unsigned();
            $table->date('date');
            $table->string('code');
            $table->string('period');
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
        Schema::dropIfExists('exam_name_index');
    }
}
