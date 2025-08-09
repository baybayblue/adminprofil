<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeachingFactory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_tefa',
        'slug',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'logo',
        'link_web',
        'kontak_person',
        'email',
        'is_active',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        // Secara otomatis membuat slug dari nama_tefa saat data baru dibuat.
        static::creating(function ($tefa) {
            $tefa->slug = Str::slug($tefa->nama_tefa);
        });

        // Jika nama_tefa diupdate, slug juga akan diupdate.
        static::updating(function ($tefa) {
            if ($tefa->isDirty('nama_tefa')) {
                $tefa->slug = Str::slug($tefa->nama_tefa);
            }
        });
    }
}
