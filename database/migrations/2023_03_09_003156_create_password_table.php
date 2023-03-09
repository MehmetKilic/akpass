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
        Schema::create('password', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('category');
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->string('url'); // unique check in controller
            $table->string('username');
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password');
    }
};