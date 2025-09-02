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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->date('date');

            // Foreign keys
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('relief')->nullable(); // kalau ada tutor relief

            // Relationships
            $table->foreign('class_id')->references('class_id')->on('class_models')->onDelete('cascade');
            $table->foreign('tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
            $table->foreign('relief')->references('tutor_id')->on('tutors')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
