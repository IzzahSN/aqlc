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
        Schema::create('join_classes', function (Blueprint $table) {
            $table->id('join_class_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('student_id');
            $table->softDeletes();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_classes');
    }
};
