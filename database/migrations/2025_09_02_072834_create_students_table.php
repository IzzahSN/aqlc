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
            $table->id('student_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ic_number', 12)->unique();
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->text('address')->nullable();
            $table->date('admission_date');
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Foreign key ke packages
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('package_id')->on('packages')->onDelete('cascade');

            $table->softDeletes(); // deleted_at
            $table->timestamps();
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
