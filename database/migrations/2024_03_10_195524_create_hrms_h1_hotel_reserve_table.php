<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hrms_h1_hotel_reserve', function (Blueprint $table) {
            $table->id();
            $table->integer('reserve_code');
            $table->string('name');
            $table->string('email');
            $table->bigInteger('contact');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('room_no');
            $table->string('room_type');
            $table->string('duration');
            $table->string('additional');
            $table->integer('price');
            $table->string('status');        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_hotel_reserve');
    }
};
