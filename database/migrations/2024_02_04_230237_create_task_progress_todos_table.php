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
        Schema::create('task_progress_todos', function (Blueprint $table) {
            $table->foreignId('task_progress_id')->constrained('user_tasks_progress');
            $table->foreignId('task_todo_id')->constrained('task_todos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_progress_todos');
    }
};
