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
        Schema::create('class_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_code', 5);
            $table->foreignId('period_id')->nullable()->constrained('school_periods');
            $table->foreignId('course_id')->nullable()->constrained('courses');
            $table->foreignId('staff_id')->nullable()->constrained('staff');

            $table->smallInteger('capacity')->default(40);
            $table->string('default_classroom', 20)->nullable();
            $table->string('language', 20)->default('SPANISH');
            $table->timestamps();

            $table->unique(['group_code', 'period_id', 'course_id'], 'unique_group_per_course_period');
            $table->index('staff_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_groups');
    }
};
