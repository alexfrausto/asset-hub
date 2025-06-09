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
        Schema::create('asset_document_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->integer('active')->default(1);
            $table->string('identifier')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('allowed_mime_types')->nullable();
        });

        Schema::create('asset_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->foreignId('asset_id')->constrained('assets');
            $table->foreignId('document_type_id')->constrained('asset_document_types');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('mime_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_document_types');
        Schema::dropIfExists('asset_documents');
    }
};
