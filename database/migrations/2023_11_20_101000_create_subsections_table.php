<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subsections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained(); // FK to sections table
            $table->unsignedTinyInteger('type');
            //type 1-text,2-code,3-link,4-img,5-exercise,6-quiz
            $table->text('text_content')->nullable();
            $table->text('code_example')->nullable();
            $table->string('link')->nullable();
            $table->string('link_title')->nullable();
            $table->string('img')->nullable();
            $table->foreignId('exercise_id')->nullable();
            $table->foreignId('quiz_id')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsections');
    }
};
