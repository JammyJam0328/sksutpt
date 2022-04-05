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
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('grouping_id')->constrained('groupings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('test_center_id')->constrained('test_centers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('examination_id')->constrained('examinations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('permit_number')->default('111110');
            $table->string('examination_date');
            $table->string('examination_day_time');
            $table->string('examination_room');
            $table->string('chair_number');
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
        Schema::dropIfExists('permits');
    }
};