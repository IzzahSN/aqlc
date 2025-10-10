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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id('achievement_id');
            $table->string('title');
            $table->string('certificate')->nullable();
            $table->date('completion_date')->nullable();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');

            $table->unsignedBigInteger('recitation_module_id');
            $table->foreign('recitation_module_id')->references('recitation_module_id')->on('recitation_modules')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
