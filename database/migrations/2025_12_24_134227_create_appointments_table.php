<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->string('full_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('specialty')->nullable();
            $table->string('ic')->nullable();
            $table->string('number')->nullable();
            $table->string('message')->nullable();

            $table->string('status')->default('Pending');

            $table->foreignId('doctor_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            $table->date('appointment_date')->nullable();
            $table->string('time_slot')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

