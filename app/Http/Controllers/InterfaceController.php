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
use App\Models\Pengumuman;
use App\Models\Organigram;
use App\Models\Jurusan;
use App\Models\Agenda;
use App\Models\Testimoni;

class InterfaceController extends Controller
{

    public function beranda()
    {
        $profil = ProfilSekolah::first();

        // $sliders = Slider::latest()->get();
        // $berita_terbaru = Artikel::latest()->take(4)->get();
        $galeri_terbaru = Galeri::latest()->take(8)->get();
        $jurusan_list = Jurusan::all();
        $guru_list = Guru::all();


        return view('interface.beranda', [
            'profil' => $profil,
            'berita_terbaru' => [], // ganti dengan $berita_terbaru nanti
            'galeri_terbaru' => [], // ganti dengan $galeri_terbaru nanti
            'jurusan_list' => [],   // ganti dengan $jurusan_list nanti
        ]);
    }

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

    public function pengumuman()
    {
        $pengumumans = Pengumuman::latest()->paginate(5);
        $recentPengumumans = Pengumuman::latest()->take(4)->get();
        return view('interface.informasi.pengumuman', compact('pengumumans', 'recentPengumumans'));
    }
    public function show(Pengumuman $pengumuman)
    {

        $recentPengumumans = Pengumuman::latest()->take(4)->get();

        return view('interface.informasi.pengumuman-detail', compact('pengumuman', 'recentPengumumans'));
    }

    public function organigram()
    {
        $organigrams = Organigram::latest()->get();
        return view('interface.profile.organigram', compact('organigrams'));
    }

    public function contact()
    {
        $profil = ProfilSekolah::first();

        return view('interface.kontak', compact('profil'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:10',
        ]);

        // Proses pengiriman email atau simpan ke database
        // Contoh:
        // ContactMessage::create($validated);

        return back()->with('success', 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
    }

    public function showVisiMisi()
    {
        $profil = ProfilSekolah::first();
        if (!$profil) {
            abort(404, 'Profil sekolah tidak ditemukan.');
        }
        return view('interface.profile.visi', compact('profil'));
    }

    public function tentangSekolah()
    {
        $profil = ProfilSekolah::first();
        return view('interface.profile.tentang', compact('profil'));
    }

    public function agenda()
    {
        $agendas = Agenda::where('tanggal_mulai', '>=', now())
            ->orderBy('tanggal_mulai')
            ->paginate(5);

        $upcomingAgendas = Agenda::where('tanggal_mulai', '>=', now())
            ->orderBy('tanggal_mulai')
            ->take(4)
            ->get();

        return view('interface.informasi.agenda', compact('agendas', 'upcomingAgendas'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $agendas = Agenda::where('judul_agenda', 'like', "%$search%")
            ->orWhere('isi_agenda', 'like', "%$search%")
            ->orderBy('tanggal_mulai')
            ->paginate(5);

        $upcomingAgendas = Agenda::where('tanggal_mulai', '>=', now())
            ->orderBy('tanggal_mulai')
            ->take(4)
            ->get();

        return view('interface.informasi.agenda', compact('agendas', 'upcomingAgendas', 'search'));
    }

    public function testimoni()
    {
        $testimonis = Testimoni::where('is_published', true)
            ->latest()
            ->get();

        return view('interface.testimoni', compact('testimonis'));
    }

    /**
     * Menyimpan testimoni baru
     */
    public function storeTestimoni(Request $request)
    {
        $validated = $request->validate([
            'nama_pemberi' => 'required|string|max:100',
            'jabatan_atau_asal' => 'required|string|max:100',
            'isi_testimoni' => 'required|string|min:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('testimonis', 'public');
        }

        // Default tidak dipublish sampai diverifikasi admin
        $validated['is_published'] = false;

        Testimoni::create($validated);

        return back()->with('success', 'Terima kasih atas testimoni Anda. Testimoni akan ditampilkan setelah diverifikasi oleh admin.');
    }
}
