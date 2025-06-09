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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->string('identifier')->unique();
            $table->foreignId('asset_category_id')->constrained('asset_categories');
            $table->text('search_text');
        });

        Schema::create('asset_values', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('asset_id')->constrained('assets');
            $table->foreignId('asset_attribute_id')->constrained('asset_attributes');
            $table->string('value_string')->nullable();
            $table->integer('value_integer')->nullable();
            $table->decimal('value_decimal', 10, 2)->nullable();
            $table->date('value_date')->nullable();
            $table->boolean('value_boolean')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
        Schema::dropIfExists('asset_values');
    }
};
