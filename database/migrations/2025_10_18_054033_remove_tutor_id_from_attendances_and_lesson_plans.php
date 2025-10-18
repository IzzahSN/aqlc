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
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['tutor_id']);
            $table->dropColumn('tutor_id');
        });

        Schema::table('lesson_plans', function (Blueprint $table) {
            $table->dropForeign(['tutor_id']);
            $table->dropColumn('tutor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->unsignedBigInteger('tutor_id')->nullable();
            $table->foreign('tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
        });

        Schema::table('lesson_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('tutor_id')->nullable();
            $table->foreign('tutor_id')->references('tutor_id')->on('tutors')->onDelete('cascade');
        });
    }
};
