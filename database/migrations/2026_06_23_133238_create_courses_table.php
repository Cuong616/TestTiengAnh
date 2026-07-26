<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->enum('level', ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'])->default('A1');
            $table->enum('category', ['vocabulary', 'grammar', 'listening', 'speaking', 'reading', 'writing'])->default('vocabulary');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->integer('duration_minutes')->default(0);  // tổng thời gian
            $table->integer('order')->default(0);             // thứ tự hiển thị
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
