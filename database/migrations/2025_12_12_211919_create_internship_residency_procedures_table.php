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
        Schema::create('internship_residency_procedures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('students');
            $table->foreignId('period_id')->nullable()->constrained('school_periods');

            $table->string('procedure_type', 20);
            $table->string('project_name', 255)->nullable();
            $table->string('company_name', 255)->nullable();

            $table->foreignId('internal_advisor_id')->nullable()->constrained('staff');
            $table->string('external_advisor_name', 150)->nullable();

            $table->string('status', 20)->default('REQUESTED');
            $table->smallInteger('grade')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_residency_procedures');
    }
};
