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
        Schema::create('packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->string('package_name');
            $table->decimal('package_rate', 8, 2);
            $table->string('duration_per_sessions'); // contoh: "30 minutes", "1 hour"
            $table->string('unit'); // contoh: "per month", "per session"
            $table->text('details')->nullable();
            $table->integer('session_per_week');
            $table->timestamps();
            $table->softDeletes(); // untuk column deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
