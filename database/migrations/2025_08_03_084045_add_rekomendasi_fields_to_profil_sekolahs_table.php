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
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->string('akreditasi', 20)->nullable()->after('npsn');
            $table->integer('tahun_berdiri')->nullable()->after('akreditasi');
            $table->string('kepala_sekolah', 100)->nullable()->after('misi');
            $table->text('sambutan_kepala')->nullable()->after('kepala_sekolah');
            $table->string('foto_kepala_sekolah', 255)->nullable()->after('sambutan_kepala');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->dropColumn([
                'akreditasi',
                'tahun_berdiri',
                'kepala_sekolah',
                'sambutan_kepala', // <-- Ini yang kurang
                'foto_kepala_sekolah'
            ]);
        });
    }
};