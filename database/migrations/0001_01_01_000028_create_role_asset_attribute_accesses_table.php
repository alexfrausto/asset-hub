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
        Schema::create('role_asset_attribute_accesses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('asset_attribute_id')->constrained('asset_attributes');
            $table->unique(['role_id', 'asset_attribute_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_asset_attribute_accesses');
    }
};
