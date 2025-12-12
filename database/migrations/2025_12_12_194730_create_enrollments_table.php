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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->nullable()->constrained('school_periods');
            $table->foreignId('student_id')->nullable()->constrained('students');
            $table->foreignId('class_group_id')->nullable()->constrained('class_groups');

            $table->timestamp('enrollment_date')->useCurrent();
            $table->string('course_type', 20)->default('REGULAR');
            $table->smallInteger('attempt_number')->default(1);
            $table->smallIncrements('final_grade')->nullable();
            $table->boolean('is_acredited')->default(false);
            $table->timestamps();

            $table->unique(['period_id', 'student_id', 'class_group_id'], 'unique_enrollment');
            $table->index('student_id');
            $table->index('class_group_id');
            $table->index('period_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
