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
        Schema::create('role_actions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('role_id')->constrained('roles');
            $table->string('action');
            $table->unique(['role_id', 'action']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_actions');
    }
};
