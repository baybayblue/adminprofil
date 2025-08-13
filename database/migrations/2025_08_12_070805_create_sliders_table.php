<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('subjudul');
            $table->string('gambar'); // Untuk menyimpan path gambar
            $table->string('tombol_teks')->nullable();
            $table->string('tombol_url')->nullable();
            $table->boolean('status')->default(true); // Untuk mengaktifkan/menonaktifkan slide
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
