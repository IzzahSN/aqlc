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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id('guardian_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('ic_number', 12)->unique();
            $table->date('birth_date');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->text('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number', 15);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('profile')->nullable(); // path gambar profile
            $table->string('password'); // default hash ic_number
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
