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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrain('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('application_type');
            $table->unsignedBigInteger('application_id');
            $table->string('amount_payable')->default('275');
            $table->string('amount_paid')->default('0');
            $table->string('payment_status')->default('pending');
            $table->string('date_paid')->nullable();
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
        Schema::dropIfExists('payments');
    }
};