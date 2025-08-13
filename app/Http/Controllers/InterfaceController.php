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
use App\Models\Ekstrakurikuler;
use App\Models\PostEkstrakurikuler;
use App\Models\Slider;
use App\Models\Background;

class InterfaceController extends Controller
{

    public function beranda()
    {
        $profil = ProfilSekolah::first();
        $sliders = Slider::where('status', true)->get();
        $galeri_terbaru = Galeri::latest()->take(8)->get();
        $jurusan_list = Jurusan::all();
        $guru_list = Guru::all();
        $berita_terbaru = Konten::latest()->take(4)->get();

        return view('interface.beranda', [
            'profil' => $profil,
            'berita_terbaru' => $berita_terbaru,
            'galeri_terbaru' => $galeri_terbaru,
            'jurusan_list' => $jurusan_list,
            'guru_list' => $guru_list,
            'sliders' => $sliders,
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
        $background = Background::where('halaman', 'konten')->first();
        return view('interface.informasi.daftar-konten', [
            'kontens' => $kontens,
            'judulHalaman' => $judulHalaman,
            'background' => $background,
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
        $background = Background::where('halaman', 'galeri')->first();

        return view('interface.galeri', [
            'galeriItems' => $galeriItems,
            'background' => $background
        ]);
    }

    public function galeriFoto()
    {
        $semuaFoto = Galeri::where('tipe', 'foto')->latest()->get();
        $filterJudul = $semuaFoto->pluck('judul')->unique();
        $background = Background::where('halaman', 'galeri')->first();
        return view('interface.galeri.foto', compact('semuaFoto', 'filterJudul', 'background'));
    }

    public function galeriVideo()
    {
        $semuaVideo = Galeri::where('tipe', 'video')->latest()->get();
        $filterJudul = $semuaVideo->pluck('judul')->unique();
        $background = Background::where('halaman', 'galeri')->first();
        return view('interface.galeri.video', compact('semuaVideo', 'filterJudul', 'background'));
    }

    public function tampilkanGuru()
    {
        $semuaGuru = Guru::with('jurusan')->orderBy('nama', 'asc')->get();
        $background = Background::where('halaman', 'sarana')->first();

        return view('interface.profile.guru', [
            'semuaGuru' => $semuaGuru,
            'background' => $background,
        ]);
    }

    public function tampilkanPrestasi()
    {
        $semuaPrestasi = Prestasi::orderBy('created_at', 'desc')->paginate(9);
        $background = Background::where('halaman', 'sarana')->first();

        return view('interface.profile.prestasi', [
            'semuaPrestasi' => $semuaPrestasi,
            'background' => $background,
        ]);
    }

    public function tampilkanSarana()
    {
        $semuaSarana = Sarana::orderBy('nama_sarana', 'asc')->get();
        $filterSaranas = Sarana::pluck('nama_sarana')->unique();
        $background = Background::where('halaman', 'sarana')->first();

        return view('interface.profile.sarana', [
            'semuaSarana' => $semuaSarana,
            'filterSaranas' => $filterSaranas,
            'background' => $background,
        ]);
    }

    public function pengumuman()
    {
        $pengumumans = Pengumuman::latest()->paginate(5);
        $recentPengumumans = Pengumuman::latest()->take(4)->get();
        $background = Background::where('halaman', 'konten')->first();

        return view('interface.informasi.pengumuman', compact('pengumumans', 'recentPengumumans', 'background'));
    }
    public function show(Pengumuman $pengumuman)
    {

        $recentPengumumans = Pengumuman::latest()->take(4)->get();

        return view('interface.informasi.pengumuman-detail', compact('pengumuman', 'recentPengumumans'));
    }

    public function organigram()
    {
        $organigrams = Organigram::latest()->get();
        $background = Background::where('halaman', 'organigram')->first();
        return view('interface.profile.organigram', compact('organigrams', 'background'));
    }

    public function contact()
    {
        $profil = ProfilSekolah::first();
        $background = Background::where('halaman', 'kontak')->first();

        return view('interface.kontak', compact('profil', 'background'));
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
        $background = Background::where('halaman', 'visi_misi')->first();
        if (!$profil) {
            abort(404, 'Profil sekolah tidak ditemukan.');
        }
        return view('interface.profile.visi', compact('profil', 'background'));
    }

    public function tentangSekolah()
    {
        $profil = ProfilSekolah::first();
        $background = Background::where('halaman', 'tentang')->first();
        return view('interface.profile.tentang', compact('profil', 'background'));
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
        $background = Background::where('halaman', 'konten')->first();


        return view('interface.informasi.agenda', compact('agendas', 'upcomingAgendas', 'background'));
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
        $background = Background::where('halaman', 'testimoni')->first();

        return view('interface.testimoni', compact('testimonis', 'background'));
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

        // DEBUGGING: Hentikan eksekusi dan tampilkan data yang tervalidasi.
        // Jika halaman ini muncul setelah submit, berarti route sudah benar.
        // Hapus atau beri komentar pada baris ini setelah debugging selesai.
        // dd($validated);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('testimonis', 'public');
        }

        // Default tidak dipublish sampai diverifikasi admin
        $validated['is_published'] = false;

        Testimoni::create($validated);

        return back()->with('success', 'Terima kasih atas testimoni Anda. Testimoni akan ditampilkan setelah diverifikasi oleh admin.');
    }

    public function albumEkskul()
    {
        $semuaEkskul = Ekstrakurikuler::latest()->get();
        $background = Background::where('halaman', 'ekstrakurikuler')->first();

        return view('interface.ekskul.album', compact('semuaEkskul', 'background'));
    }

    public function galeriEkskul($id)
    {
        // Cari ekstrakurikuler berdasarkan ID, jika tidak ada, tampilkan error 404
        $ekskul = Ekstrakurikuler::findOrFail($id);

        // Ambil semua post/foto yang berhubungan dengan ekskul ini
        $semuaFoto = PostEkstrakurikuler::where('ekstrakurikuler_id', $id)->latest()->get();

        // Buat daftar judul unik untuk tombol filter
        $filterJudul = $semuaFoto->pluck('nama_kegiatan')->unique();
        
        // Ambil background untuk halaman
        $background = Background::where('halaman', 'galeri')->first(); // Menggunakan background galeri

        return view('interface.ekskul.galeri', compact('ekskul', 'semuaFoto', 'filterJudul', 'background'));
    }

    public function jurusan()
    {
        $jurusans = Jurusan::all();
        $background = Background::where('halaman', 'sarana')->first();
        return view('interface.profile.jurusan', compact('jurusans', 'background'));
    }
}
