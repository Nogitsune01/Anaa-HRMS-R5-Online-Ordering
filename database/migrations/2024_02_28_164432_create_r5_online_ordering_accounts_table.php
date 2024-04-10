<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hrms_r5_online_ordering_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('room_type');
            $table->integer('room_no');
            $table->string('guest_id');
            $table->string('status');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('r5_online_ordering_accounts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
