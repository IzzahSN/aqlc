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
        Schema::create('recitation_modules', function (Blueprint $table) {
            $table->id('recitation_module_id');
            $table->string('recitation_name');
            $table->integer('first_page');
            $table->integer('end_page');
            $table->enum('level_type', ['Iqra', 'Quran']);
            $table->string('badge')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recitation_modules');
    }
};
