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
        Schema::create('feco_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_type');
            $table->string('prefix');
            $table->string('number');
            $table->boolean('is_valid')->default(false);
            $table->string('status_code');
            $table->string('status_description')->nullable();
            $table->string('status_message')->nullable();
            $table->json('error_message');
            $table->longText('cufe');
            $table->longText('zip_base64_bytes');
            $table->string('xml_name');
            $table->longText('qr_code');
            $table->nullableMorphs('documentable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feco_documents');
    }
};
