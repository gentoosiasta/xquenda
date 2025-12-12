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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('tax_id', 13)->unique(); // RFC
            $table->string('national_id', 18)->unique(); // CURP
            $table->string('employee_number', 4)->unique();
            $table->string('first_name', 50);
            $table->string('last_name_1', 50);
            $table->string('last_name_2', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('institutional_email', 100)->nullable();
            $table->string('personal_email', 100)->nullable();
            $table->string('mobile_phone', 20)->nullable();

            $table->foreignId('department_id')->nullable()->constrained('departments');
            $table->foreignId('marital_status_id')->nullable()->constrained('marital_statuses');
            $table->foreignId('blood_type_id')->nullable()->constrained('blood_types');
            $table->foreignId('max_education_level_id')->nullable()->constrained('education_levels');

            $table->string('street_address', 150)->nullable();
            $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods');

            $table->char('status', 1)->default('A');
            $table->timestamps();

            $table->index('tax_id');
            $table->index('national_id');
            $table->index(['last_name_1', 'first_name']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
