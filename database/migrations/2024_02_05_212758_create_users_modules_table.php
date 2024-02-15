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
        Schema::create('users_modules', function (Blueprint $table) {
            $table->foreignId('module_id')->constrained('modules');
            $table->foreignId('user_id')->constrained('users');
            $table->string('status')->default('onhold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_modules');
    }
};
