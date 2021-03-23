<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('First_Name');
            $table->string('Family_Name');
            $table->string('Father_Name');
            $table->string('Date_Of_Birth');
            $table->string('Current_Country');
            $table->date('Current_City');
            $table->string('Nationality');

            $table->integer('Phone_Number');
            $table->integer('Email');
            $table->string('Facebook_Page');

            $table->integer('Degree');
            $table->string('Specialization');
            $table->string('University');
            $table->string('English_Level');

            $table->string('Position');
            $table->string('Company');

            $table->string('Department');
            $table->string('Department_Reason');
            $table->date('Voluntary_Reason');
            $table->date('Six_Months');

            $table->string('Accepting_Status')->default(0);
            $table->string('Volunteer_History')->nullable();
            $table->string('Notes')->nullable();

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
        Schema::dropIfExists('volunteers_tables');
    }
}
