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
        Schema::create('student_guardians', function (Blueprint $table) {
            $table->id('student_guardian_id');

            // Foreign Keys
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('guardian_id');

            // Relationship type
            $table->enum('relationship_type', ['Father', 'Mother', 'Guardian', 'Other'])->default('Guardian');

            $table->timestamps();
            $table->softDeletes();

            // Constraints
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('guardian_id')->references('guardian_id')->on('guardians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_guardians');
    }
};
