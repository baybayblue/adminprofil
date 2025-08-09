<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    /**
     * Menampilkan halaman form untuk mengelola profil sekolah.
     */
    public function index()
    {
        // Mengambil data profil pertama, atau membuat instance baru jika tidak ada.
        $profil = ProfilSekolah::firstOrNew([]);
        return view('admin.profil.index', compact('profil'));
    }

    /**
     * Menyimpan atau memperbarui data profil sekolah.
     */
    public function storeOrUpdate(Request $request)
    {
        // 1. Validasi semua input dari form.
        // Aturan validasi yang paling lengkap dari kedua versi digabungkan.
        $request->validate([
            'nama_sekolah'      => 'required|string|max:100',
            'npsn'              => 'nullable|string|max:20',
            'alamat'            => 'required|string',
            'no_telp'           => 'required|string|max:20',
            'email'             => 'required|email|max:100',
            'sejarah'           => 'required|string',
            'visi'              => 'required|string',
            'misi'              => 'required|string',
            'akreditasi'        => 'nullable|string|max:20',
            'tahun_berdiri'     => 'nullable|integer|min:1900',
            'kepala_sekolah'    => 'nullable|string|max:100',
            'sambutan_kepala'   => 'nullable|string',
            'logo'              => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // Hanya satu aturan untuk logo
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'facebook_url'      => 'nullable|string|max:100',
            'instagram_url'     => 'nullable|string|max:100',
            'youtube_url'       => 'nullable|string|max:100',
            'tiktok_url'        => 'nullable|string|max:100',
        ]);

        // 2. Cari data profil yang ada, atau buat instance baru jika belum ada.
        $profil = ProfilSekolah::firstOrNew(['id' => 1]);
        
        // 3. Ambil semua data dari request kecuali file gambar.
        $data = $request->except(['logo', 'foto_kepala_sekolah']);

        // 4. Proses upload logo jika ada file baru yang diunggah.
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada untuk mencegah penumpukan file.
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            // Simpan logo baru dan tambahkan path ke array data.
            $data['logo'] = $request->file('logo')->store('profil', 'public');
        }

        // 5. Proses upload foto kepala sekolah jika ada file baru.
        if ($request->hasFile('foto_kepala_sekolah')) {
            // Hapus foto lama jika ada.
            if ($profil->foto_kepala_sekolah && Storage::disk('public')->exists($profil->foto_kepala_sekolah)) {
                Storage::disk('public')->delete($profil->foto_kepala_sekolah);
            }
            // Simpan foto baru dan tambahkan path ke array data.
            $data['foto_kepala_sekolah'] = $request->file('foto_kepala_sekolah')->store('profil', 'public');
        }
        
        // 6. Isi model dengan data dan simpan ke database.
        $profil->fill($data)->save();

        // 7. Redirect kembali ke halaman profil dengan pesan sukses.
        return redirect()->route('admin.profil.index')
                         ->with('success', 'Profil Sekolah berhasil diperbarui.');
    }
}
