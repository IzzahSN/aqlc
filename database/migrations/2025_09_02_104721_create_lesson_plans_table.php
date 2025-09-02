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
        Schema::create('lesson_plans', function (Blueprint $table) {
            $table->id('lesson_plan_id');
            $table->string('title');
            $table->string('learning_materials'); // simpan nama file PDF
            $table->text('description')->nullable();
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('tutor_id');
            $table->softDeletes();
            $table->timestamps();

            // Foreign keys
            $table->foreign('schedule_id')->references('schedule_id')->on('schedules')->onDelete('cascade');
            $table->foreign('tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_plans');
    }
};
