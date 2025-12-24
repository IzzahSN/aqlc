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
        Schema::create('sms_logs', function (Blueprint $table) {
            $table->id('sms_id');
            $table->unsignedBigInteger('achievement_id');
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('student_id');
            $table->string('phone_number', 20);
            $table->text('message');
            $table->enum('sms_status', ['Pending', 'Sent', 'Failed'])->default('Pending');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('achievement_id')->references('achievement_id')->on('achievements')->onDelete('cascade');

            $table->foreign('guardian_id')->references('guardian_id')->on('guardians')->onDelete('cascade');

            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_logs');
    }
};
