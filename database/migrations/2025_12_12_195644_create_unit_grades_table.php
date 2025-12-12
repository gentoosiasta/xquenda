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
        Schema::create('unit_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained('enrollments')->cascadeOnDelete();
            $table->smallInteger('unit_number');
            $table->smallInteger('grade')->nullable();
            $table->timestamp('captured_date')->useCurrent();
            $table->decimal('attendance_percentage', 5, 2)->nullable();
            $table->timestamps();

            $table->unique(['enrollment_id', 'unit_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_grades');
    }
};
