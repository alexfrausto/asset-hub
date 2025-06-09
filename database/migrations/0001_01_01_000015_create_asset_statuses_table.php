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
        Schema::create('asset_status_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->string('identifier')->unique();
            $table->foreignId('asset_category_id')->constrained('asset_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('color')->nullable();
        });

        Schema::create('asset_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('asset_id')->constrained('assets');
            $table->foreignId('status_type_id')->constrained('asset_status_types');
            $table->timestamp('start_at');
            $table->timestamp('end_at')->nullable();
            $table->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_status_types');
        Schema::dropIfExists('asset_statuses');
    }
};
