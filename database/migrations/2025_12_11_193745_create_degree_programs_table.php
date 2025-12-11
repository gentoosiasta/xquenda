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
        Schema::create('degree_programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_code', 20)->unique();
            $table->string('name', 150);
            $table->string('acronym', 10)->nullable();
            $table->char('academic_level', 1)->nullable();
            $table->integer('total_credits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degree_programs');
    }
};
