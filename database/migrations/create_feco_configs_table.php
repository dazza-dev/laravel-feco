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
        // Softwares
        Schema::create('feco_softwares', function (Blueprint $table) {
            $table->id();
            $table->boolean('test')->default(false);
            $table->string('identifier');
            $table->string('test_set_id')->nullable();
            $table->string('pin');
            $table->enum('type', ['invoice', 'support-document', 'equivalent-document']);
            $table->nullableMorphs('softwareable');
            $table->timestamps();
            $table->softDeletes();
        });

        // Certificates
        Schema::create('feco_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('password');
            $table->date('expiration_date');
            $table->nullableMorphs('certificable');
            $table->timestamps();
            $table->softDeletes();
        });

        // Numbering Ranges
        Schema::create('feco_numbering_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->nullable();
            $table->string('authorized_code');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('start_number');
            $table->integer('end_number');
            $table->string('technical_key');
            $table->enum('type', ['invoice', 'support-document', 'equivalent-document']);
            $table->nullableMorphs('rangeable');
            $table->timestamps();
            $table->softDeletes();
        });

        // Document Types
        Schema::create('feco_document_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code')->unique();
            $table->char('hash_type')->nullable();
            $table->char('code_type');
            $table->timestamps();
            $table->softDeletes();
        });

        // Listings
        Schema::create('feco_listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('code');
            $table->string('description')->nullable();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['code', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feco_softwares');
        Schema::dropIfExists('feco_certificates');
        Schema::dropIfExists('feco_numbering_ranges');
        Schema::dropIfExists('feco_document_types');
        Schema::dropIfExists('feco_listings');
    }
};
