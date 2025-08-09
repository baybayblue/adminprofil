<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilSekolahController;
use App\Http\Controllers\Admin\OrganigramController;
use App\Http\Controllers\Admin\KontenController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\SaranaController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\PostEkstrakurikulerController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\InterfaceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Rute Halaman Awal (Publik)
Route::get('/', [InterfaceController::class, 'beranda'])->name('beranda');
Route::get('/berita', [InterfaceController::class, 'daftarKonten'])->defaults('jenis', 'berita')->name('berita.index');
Route::get('/berita/{slug}', [InterfaceController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/artikel', [InterfaceController::class, 'daftarKonten'])->defaults('jenis', 'artikel')->name('artikel.index');
Route::get('/artikel/{slug}', [InterfaceController::class, 'artikelDetail'])->name('artikel.detail');
Route::get('/galeri', [InterfaceController::class, 'tampilkanGaleri'])->name('galeri.tampil');
Route::get('/guru', [InterfaceController::class, 'tampilkanGuru'])->name('guru.tampil');
Route::get('/prestasi', [InterfaceController::class, 'tampilkanPrestasi'])->name('prestasi.tampil');
Route::get('/sarana-prasarana', [InterfaceController::class, 'tampilkanSarana'])->name('sarana.tampil');
Route::get('/pengumuman', [InterfaceController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman}', [InterfaceController::class, 'show'])->name('pengumuman.show');
Route::get('/organigram', [InterfaceController::class, 'organigram'])->name('organigram');
Route::get('/kontak', [InterfaceController::class, 'kontak'])->name('kontak');
Route::get('/profil/visi-misi', [InterfaceController::class, 'showVisiMisi'])->name('profil.visi-misi');
Route::get('/tentang-kami', [InterfaceController::class, 'tentangSekolah'])->name('profil.tentang');


// Route::get('/teaching-factory', [InterfaceController::class, 'tefaIndex'])->name('teaching');

//=======================================================================
// RUTE UNTUK AUTENTIKASI (LOGIN & LOGOUT)
//=======================================================================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//=======================================================================
// RUTE UNTUK HALAMAN ADMIN YANG DILINDUNGI
//=======================================================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Rute Dasbor & Profil Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
     Route::get('/profil-admin', [AdminProfileController::class, 'index'])->name('profil_admin.index');
     Route::put('/profil-admin/profile', [AdminProfileController::class, 'updateProfile'])->name('profil_admin.updateProfile');
     Route::put('/profil-admin/password', [AdminProfileController::class, 'updatePassword'])->name('profil_admin.updatePassword');
 
    // --- Rute Manajemen Halaman & Profil ---
    Route::get('/profil-sekolah', [ProfilSekolahController::class, 'index'])->name('profil.index');
    Route::post('/profil-sekolah', [ProfilSekolahController::class, 'storeOrUpdate'])->name('profil.storeOrUpdate');
    
    // --- Rute Organigram (Diperbarui) ---
    Route::resource('organigram', OrganigramController::class);
    
    // --- Rute Publikasi ---
    Route::resource('konten', KontenController::class);
    Route::resource('agenda', AgendaController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('sarana', SaranaController::class);
    Route::resource('galeri', GaleriController::class)->except(['show']);
    Route::resource('testimoni', TestimoniController::class)->only(['index', 'show', 'destroy']);
    Route::patch('/testimoni/{testimoni}/toggle-status', [TestimoniController::class, 'toggleStatus'])->name('testimoni.toggleStatus');

    // --- Rute Manajemen Akademik ---
    Route::resource('jurusan', JurusanController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
    Route::resource('post-ekstrakurikuler', PostEkstrakurikulerController::class);
    Route::resource('prestasi', PrestasiController::class);
});
