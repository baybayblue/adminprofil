<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::firstOrNew([]);
        return view('admin.profil.index', compact('profil'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|string|max:100',
            'npsn' => 'nullable|string|max:20',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'maps' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'jam_operasional' => 'nullable|string', // <-- Validasi baru
            'foto_gedung' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // <-- Validasi baru
        ]);

        $profil = ProfilSekolah::firstOrNew(['id' => 1]);
        
        $data = $request->except(['logo', 'foto_gedung']);

        // Proses upload logo
        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        // Proses upload foto gedung
        if ($request->hasFile('foto_gedung')) {
            if ($profil->foto_gedung && Storage::disk('public')->exists($profil->foto_gedung)) {
                Storage::disk('public')->delete($profil->foto_gedung);
            }
            $data['foto_gedung'] = $request->file('foto_gedung')->store('gedung', 'public');
        }
        
        $profil->fill($data)->save();

        return redirect()->route('admin.profil.index')
                         ->with('success', 'Profil Sekolah berhasil diperbarui.');
    }
}