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
            $table->boolean('is_complete_series')->default(0)->after('end_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recitation_modules', function (Blueprint $table) {
            $table->dropColumn('is_complete_series');
        });
    }
};
