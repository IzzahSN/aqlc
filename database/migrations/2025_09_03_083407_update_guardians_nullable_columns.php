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
        Schema::table('guardians', function (Blueprint $table) {
            $table->date('birth_date')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->enum('gender', ['male', 'female'])->nullable()->change();
            $table->string('email')->nullable(false)->change(); // buang ->unique()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guardians', function (Blueprint $table) {
            $table->date('birth_date')->nullable(false)->change();
            $table->integer('age')->nullable(false)->change();
            $table->enum('gender', ['male', 'female'])->nullable(false)->change();
            $table->string('email')->nullable()->change(); // buang ->unique() juga
        });
    }
};
