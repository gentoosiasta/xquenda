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
        Schema::create('curriculum_subjects', function (Blueprint $table) {
            $table->foreignId('study_plan_id')->constrained('study_plans');
            $table->foreignId('course_id')->constrained('courses');
            $table->smallInteger('suggedted_semester')->nullable();
            $table->timestamps();

            $table->primary(['study_plan_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_subjects');
    }
};
