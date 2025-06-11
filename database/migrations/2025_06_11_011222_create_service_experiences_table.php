<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('rating')->between(1, 5);
            $table->enum('courteous_staff', ['Yes', 'No', 'Somewhat']);
            $table->enum('completion_time', ['Less than 10 minutes', '10–30 minutes', 'More than 30 minutes', 'I didn’t complete it']);
            $table->enum('easy_to_understand', ['Yes', 'No', 'Somewhat']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_experiences');
    }
};