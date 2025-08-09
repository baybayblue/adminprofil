<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilSekolah;
use App\Models\TeachingFactory; 
use App\Models\Konten; 
use App\Models\Galeri; 
use App\Models\Guru; 
use App\Models\Prestasi; 
use App\Models\Sarana; 

class InterfaceController extends Controller
{
   
    public function tefaIndex()
    {
        $tefas = TeachingFactory::where('is_active', true)->latest()->get();
        return view('interface.teaching', compact('tefas'));
    }

    public function daftarKonten($jenis)
    {
        $judulHalaman = ucfirst($jenis);

        $kontens = Konten::where('jenis', $jenis)
                           ->orderBy('tgl_publikasi', 'desc')
                           ->paginate(5); 
        return view('interface.informasi.daftar-konten', [
            'kontens' => $kontens,
            'judulHalaman' => $judulHalaman,
        ]);
    }

    public function beritaDetail($slug)
    {
        $berita = Konten::where('jenis', 'berita')->where('slug', $slug)->firstOrFail();
        $beritaTerkait = Konten::where('jenis', 'berita')
                                ->where('id', '!=', $berita->id)
                                ->latest('tgl_publikasi')
                                ->take(3)
                                ->get();

        
        return view('interface.informasi.berita-detail', [
            'berita' => $berita,
            'beritaTerkait' => $beritaTerkait
        ]);
    }

    public function artikelDetail($slug)
    {
        $artikel = Konten::where('jenis', 'artikel')->where('slug', $slug)->firstOrFail();
        $artikelTerkait = Konten::where('jenis', 'artikel')
                                ->where('id', '!=', $artikel->id)
                                ->latest('tgl_publikasi')
                                ->take(3)
                                ->get();
        return view('interface.informasi.artikel-detail', [
            'artikel' => $artikel,
            'artikelTerkait' => $artikelTerkait
        ]);
    }

    public function tampilkanGaleri()
    {
        $galeriItems = Galeri::orderBy('created_at', 'desc')->get();

        return view('interface.galeri', [
            'galeriItems' => $galeriItems
        ]);
    }

    public function tampilkanGuru()
    {
        $semuaGuru = Guru::with('jurusan')->orderBy('nama', 'asc')->get();

        return view('interface.profile.guru', [
            'semuaGuru' => $semuaGuru
        ]);
    }

    public function tampilkanPrestasi()
    {
        $semuaPrestasi = Prestasi::orderBy('created_at', 'desc')->paginate(9);

        return view('interface.profile.prestasi', [
            'semuaPrestasi' => $semuaPrestasi
        ]);
    }

    public function tampilkanSarana()
    {
        $semuaSarana = Sarana::orderBy('nama_sarana', 'asc')->get();
        $filterSaranas = Sarana::pluck('nama_sarana')->unique();

        return view('interface.profile.sarana', [
            'semuaSarana' => $semuaSarana,
            'filterSaranas' => $filterSaranas,
        ]);
    }
}
