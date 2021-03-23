<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons_archive', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessons_index_id');
            $table->date('date');
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
        Schema::dropIfExists('lessons_archive');
    }
}
