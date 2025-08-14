<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Kolom dari migrasi awal
        'nama_sekolah',
        'npsn',
        'alamat',
        'no_telp',
        'email',
        'sejarah',
        'visi',
        'misi',
        'logo',
        'maps',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'akreditasi',
        'tahun_berdiri',
        'kepala_sekolah',
        'sambutan_kepala',
        'foto_kepala_sekolah',
        'jumlah_guru',
        'jumlah_siswa',
        'jumlah_ruang_kelas',
        'jam_operasional', // <-- Kolom baru
        'foto_gedung',    // <-- Kolom baru

    ];
}