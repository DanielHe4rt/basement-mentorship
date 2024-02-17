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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('company')->nullable();
            $table->string('role')->nullable();
            $table->string('seniority')->nullable();
            $table->string('based_in')->nullable();
            $table->string('pronouns')->nullable();
            $table->boolean('switching_career')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('devto_handle')->nullable();
            $table->text('comments')->nullable();
            $table->boolean('is_employed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
