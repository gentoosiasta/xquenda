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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_number', 8)->unique();
            $table->string('national_id', 18)->unique(); // CURP
            $table->string('first_name', 50);
            $table->string('last_name_1', 50);
            $table->string('last_name_2', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('institutional_email', 100)->nullable();
            $table->string('personal_email', 100)->nullable();
            $table->string('mobile_phone', 20)->nullable();

            $table->foreignId('deegree_program_id')->nullable()->constrained('deegree_programs');
            $table->foreignId('study_plan_id')->nullable()->constrained('study_plans');

            $table->smallInteger('current_semester')->default(0);
            $table->char('status', 1)->default('A');
            $table->string('admission_type', 20)->nullable();
            $table->string('previous_school', 100)->nullable();

            $table->foreignId('marital_status_id')->nullable()->constrained('marital_statuses');
            $table->foreignId('blood_type_id')->nullable()->constrained('blood_types');
            $table->foreignId('birth_place_id')->nullable()->constrained('states');

            $table->string('street_address', 150)->nullable();
            $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods');

            $table->string('password_hash', 255)->nullable();
            $table->string('photo_url')->nullable();

            $table->timestamps();

            $table->index('student_number');
            $table->index('national_id');
            $table->index(['last_name_1', 'first_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
