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
        Schema::create('groupings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('examination_test_center_id')->constrained('examination_test_centers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('day_time');
            $table->string('room');
            $table->string('slots')->default(25);
            $table->string('occupied_slots')->default(0);
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
        Schema::dropIfExists('groupings');
    }
};