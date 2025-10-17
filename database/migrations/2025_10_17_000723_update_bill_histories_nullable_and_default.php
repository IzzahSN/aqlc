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
        Schema::table('bill_histories', function (Blueprint $table) {
            $table->decimal('bill_amount', 10, 2)->nullable()->change();
            $table->date('bill_date')->nullable()->change();
            $table->enum('bill_type', ['Cash', 'Online Banking'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bill_histories', function (Blueprint $table) {
            $table->decimal('bill_amount', 10, 2)->nullable(false)->change();
            $table->date('bill_date')->nullable(false)->change();
            $table->enum('bill_type', ['Cash', 'Online Banking'])->nullable(false)->change();
        });
    }
};
