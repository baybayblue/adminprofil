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
            $table->integer('jumlah_guru')->default(0)->after('youtube_url');
            $table->integer('jumlah_siswa')->default(0)->after('jumlah_guru');
            $table->integer('jumlah_ruang_kelas')->default(0)->after('jumlah_siswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->dropColumn(['jumlah_guru', 'jumlah_siswa', 'jumlah_ruang_kelas']);
        });
    }
};