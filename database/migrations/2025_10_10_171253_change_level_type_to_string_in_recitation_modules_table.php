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
        Schema::table('recitation_modules', function (Blueprint $table) {
            $table->string('level_type')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recitation_modules', function (Blueprint $table) {
            $table->enum('level_type', ['Iqra', 'Quran'])->change();
        });
    }
};
