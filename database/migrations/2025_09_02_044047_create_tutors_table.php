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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id('tutor_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('ic_number', 12)->unique();
            $table->date('birth_date');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->text('address')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number', 15);

            $table->string('university')->nullable();
            $table->string('programme')->nullable();
            $table->decimal('grade', 3, 2)->nullable(); // contoh: 3.95
            $table->string('resume')->nullable(); // simpan path resume upload
            $table->text('bg_description')->nullable();

            $table->enum('role', ['Admin', 'Tutor'])->default('Tutor');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('profile')->nullable();
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
        Schema::dropIfExists('tutors');
    }
};
