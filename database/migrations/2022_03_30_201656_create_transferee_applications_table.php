<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferee_applications', function (Blueprint $table) {
           $table->id();
           $table->foreignId('examination_id')->constrained('examinations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('program_choice_campus')->nullable();
            $table->string('program_choice')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('age')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('tribe')->nullable();
            $table->string('religion')->nullable();
            $table->string('previous_program_taken')->nullable();
            $table->string('last_school_attended')->nullable();
            $table->string('school_year_last_attended')->nullable();
            $table->string('photo')->nullable();
            $table->string('sex')->nullable();
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
        Schema::dropIfExists('transferee_applications');
    }
};