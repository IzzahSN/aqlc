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
        Schema::create('bill_histories', function (Blueprint $table) {
            $table->id('bill_id');
            $table->decimal('bill_amount', 10, 2);
            $table->string('bill_receipt')->nullable(); // proof (file path / URL)
            $table->enum('bill_type', ['Cash', 'Online Banking']);
            $table->enum('bill_status', ['Pending', 'Paid', 'Unpaid'])->default('Pending');
            $table->date('bill_date');
            $table->string('transaction_id')->nullable();

            // Foreign Keys
            $table->unsignedBigInteger('tutor_id')->nullable();
            $table->unsignedBigInteger('guardian_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('salary_id')->nullable();
            $table->unsignedBigInteger('student_bill_id')->nullable();

            // Relationships
            $table->foreign('tutor_id')->references('tutor_id')->on('tutors')->onDelete('set null');
            $table->foreign('guardian_id')->references('guardian_id')->on('guardians')->onDelete('set null');
            $table->foreign('package_id')->references('package_id')->on('packages')->onDelete('set null');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('set null');
            $table->foreign('salary_id')->references('salary_id')->on('salary_records')->onDelete('set null');
            $table->foreign('student_bill_id')->references('student_bill_id')->on('student_bills')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_histories');
    }
};
