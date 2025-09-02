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
        Schema::create('class_models', function (Blueprint $table) {
            $table->id('class_id');
            $table->string('class_name');
            $table->integer('capacity')->default(1); // default 1 utk personal class
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room')->nullable();
            $table->enum('day', [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ]);
            $table->enum('status', ['Available', 'Full'])->default('Available');

            // Foreign keys
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('package_id');

            // Define relationships
            $table->foreign('tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
            $table->foreign('package_id')->references('package_id')->on('packages')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_models');
    }
};
