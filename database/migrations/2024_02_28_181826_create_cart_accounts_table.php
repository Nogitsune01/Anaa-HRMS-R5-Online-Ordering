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
        Schema::create('hrms_r5_cart_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acc_id');
            $table->string('email');
            $table->string('category');
            $table->string('title');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('images');
            $table->foreign('acc_id')->references('id')->on('hrms_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('cart_accounts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
};
