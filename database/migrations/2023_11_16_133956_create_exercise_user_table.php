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
        Schema::create('exercise_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercise_id')->constrained(); // FK to exercises table
            $table->foreignId('user_id')->constrained(); // FK to users table
            $table->boolean('finish')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_user');
    }
};
