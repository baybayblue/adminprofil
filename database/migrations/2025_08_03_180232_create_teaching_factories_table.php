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
        Schema::create('teaching_factories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tefa');
            $table->string('slug')->unique();
            
            // Relasi ke jurusan (opsional tapi sangat direkomendasikan)
            // $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');

            $table->text('deskripsi_singkat');
            $table->text('deskripsi_lengkap'); 
            
            $table->string('logo'); 
            
            $table->string('link_web')->nullable(); 
            
            $table->string('kontak_person')->nullable();
            $table->string('email')->nullable();
            
            $table->boolean('is_active')->default(true); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_factories');
    }
};
