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
        Schema::create('employee_document_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->integer('active')->default(1);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('allowed_mime_types')->nullable();
        });

        Schema::create('employee_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('mime_type');
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('document_type_id')->constrained('employee_document_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_document_types');
        Schema::dropIfExists('employee_documents');
    }
};
