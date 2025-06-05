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
        Schema::create('asset_attributes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->integer('active')->default(1);
            $table->string('identifier')->unique();
            $table->foreignId('asset_category_id')->constrained('asset_categories');
            $table->foreignId('asset_group_id')->nullable()->constrained('asset_groups');
            $table->string('label');
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->integer('required')->default(0);
            $table->integer('unique')->default(0);
            $table->integer('max_length')->nullable(255);
            $table->integer('max_value')->nullable();
            $table->integer('min_value')->nullable();
            $table->string('placeholder')->nullable();
            $table->integer('sort_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_attributes');
    }
};
