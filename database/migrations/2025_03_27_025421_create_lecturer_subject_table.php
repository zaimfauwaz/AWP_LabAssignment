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
        Schema::create('lecturer_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('lecturers', 'staff_id')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects', 'subject_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturer_subject');
    }
};
