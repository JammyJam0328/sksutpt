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
        Schema::create('freshmen_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_id')->constrained('examinations')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_choice_campus')->nullable();
            $table->string('first_choice')->nullable();
            $table->string('second_choice_campus')->nullable();
            $table->string('second_choice')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('extension')->nullable();
            $table->string('last_name')->nullable();
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
            $table->string('school_last_attended')->nullable();
            $table->string('school_last_attended_address')->nullable();
            $table->string('track_and_strand_taken')->nullable();
            $table->string('school_year_graduated')->nullable();
            $table->string('honor_or_awards_received')->nullable();
            $table->string('photo')->nullable();
            $table->string('copy_of_gpa')->nullable();
            $table->string('principal_certification_or_school_id')->nullable();
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
        Schema::dropIfExists('freshmen_applications');
    }
};