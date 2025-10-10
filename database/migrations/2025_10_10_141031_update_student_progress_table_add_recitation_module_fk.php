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
        Schema::table('student_progress', function (Blueprint $table) {
            //buang column recitation
            $table->dropColumn('recitation');
            //add foreign key recitation_module_id
            $table->unsignedBigInteger('recitation_module_id')->nullable();
            $table->foreign('recitation_module_id')->references('recitation_module_id')->on('recitation_modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_progress', function (Blueprint $table) {
            //add back column recitation
            $table->string('recitation')->nullable();
            //drop foreign key recitation_module_id
            $table->dropForeign(['recitation_module_id']);
            $table->dropColumn('recitation_module_id');
        });
    }
};
