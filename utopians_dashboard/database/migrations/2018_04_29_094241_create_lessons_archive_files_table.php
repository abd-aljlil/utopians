<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsArchiveFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons_archive_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessons_archive_id');
            $table->string('file');
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
        Schema::dropIfExists('lessons_archive_files');
    }
}
