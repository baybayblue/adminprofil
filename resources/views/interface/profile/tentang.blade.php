@extends('layouts.app')
@section('title', 'Tentang Kami')

@push('styles')
<style>
    .facility-card {
        background: #fff;
        padding: 30px 20px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
        text-align: center;
    }
    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .facility-icon {
        font-size: 40px;
        color: #f39c12;
        margin-bottom: 15px;
    }
    .achievement-box {
        background: #fff;
        padding: 40px 20px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .achievement-number {
        font-size: 50px;
        font-weight: 700;
        color: #f39c12;
        margin-bottom: 10px;
    }
    .about-us span {
        display: block;
        margin-bottom: 8px;
    }
    .about-us i {
        color: #f39c12;
        margin-right: 10px;
    }
    .vision-box, .mission-box {
        background: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
    }
    .vision-box h4 i {
        color: #3498db;
        margin-right: 10px;
    }
    .mission-box h4 i {
        color: #2ecc71;
        margin-right: 10px;
    }
</style>
@endpush

@section('interface')

<!-- 
    Area Breadcrumb dan Banner Halaman.
    Background gambar sekarang diatur dari tabel 'backgrounds'.
    Anda mungkin perlu menambahkan key 'tentang' di controller Anda.
-->
<div class="breadcrumb-banner-area"
     style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Tentang SMK Kami</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Tentang Kami</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Breadcrumb Area -->

<!-- Keunggulan Sekolah Start -->
<div class="activity-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity">
                    <div class="single-activity-icon">
                        <i class="fa fa-industry"></i>
                    </div>
                    <h4>Link and Match Industri</h4>
                    <p>Kurikulum berbasis kompetensi yang diselaraskan dengan kebutuhan dunia kerja.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity">
                    <div class="single-activity-icon">
                        <i class="fa fa-certificate"></i>
                    </div>
                    <h4>Sertifikasi Kompetensi</h4>
                    <p>Program sertifikasi berbasis industri untuk meningkatkan kompetensi lulusan.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity mrg-res-top-md">
                    <div class="single-activity-icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <h4>Teaching Factory</h4>
                    <p>Pembelajaran berbasis produksi untuk pengalaman kerja nyata.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity mrg-res-top-md">
                    <div class="single-activity-icon">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <h4>Teknologi Modern</h4>
                    <p>Fasilitas pembelajaran berbasis teknologi terkini.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Keunggulan Sekolah -->

<!-- Profil Sekolah Start -->
<div class="about-area section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Profil SMK Kami</h3>
                        <p>Identitas dan sejarah singkat sekolah kami</p>
                    </div>
                </div> 
            </div>      
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text-container">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . ($profil->logo ?? 'default/logo.png')) }}" alt="Logo SMK" class="img-fluid" style="max-height: 150px;">
                    </div>
                    
                    <h4 class="mb-3">{{ $profil->nama_sekolah ?? 'SMK Contoh' }}</h4>
                    <p>{!! $profil->sejarah ?? 'SMK kami berdiri dengan komitmen untuk menyiapkan tenaga kerja terampil yang siap bersaing di dunia industri. Dengan fasilitas praktikum yang memadai dan kerjasama yang kuat dengan dunia usaha/dunia industri, kami bertekad menjadi lembaga pendidikan vokasi unggulan.' !!}</p>
                    
                    <div class="about-us">
                        <span><i class="fa fa-check-circle"></i> <strong>NPSN:</strong> {{ $profil->npsn ?? '12345678' }}</span>
                        <span><i class="fa fa-check-circle"></i> <strong>Akreditasi:</strong> {{ $profil->akreditasi ?? 'A (Unggul)' }}</span>
                        <span><i class="fa fa-check-circle"></i> <strong>Tahun Berdiri:</strong> {{ $profil->tahun_berdiri ?? '1990' }}</span>
                        <span><i class="fa fa-check-circle"></i> <strong>Alamat:</strong> {{ $profil->alamat ?? 'Jl. Contoh No. 123' }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/workshop.jpg') }}" alt="Workshop Praktik" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/lab-komputer.jpg') }}" alt="Lab Komputer" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/teaching-factory.jpg') }}" alt="Teaching Factory" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/siswa-praktik.jpg') }}" alt="Siswa Praktik" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Profil Sekolah -->

<!-- Visi Misi Start -->
<div class="skill-and-experience-area bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Visi & Misi</h3>
                        <p>Landasan dalam penyelenggaraan pendidikan</p>
                    </div>
                </div> 
            </div>      
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="vision-box">
                    <h4><i class="fa fa-bullseye"></i> Visi</h4>
                    <p>{!! $profil->visi ?? '"Menjadi SMK unggulan yang menghasilkan lulusan kompeten, berkarakter, dan siap bersaing di dunia kerja global."' !!}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mission-box">
                    <h4><i class="fa fa-tasks"></i> Misi</h4>
                    <div>{!! $profil->misi ?? '1. Menyelenggarakan pendidikan vokasi berbasis kompetensi<br>2. Mengembangkan kerjasama dengan dunia usaha/industri<br>3. Membentuk karakter peserta didik yang berakhlak mulia<br>4. Menerapkan budaya kerja industri di lingkungan sekolah' !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Visi Misi -->

<!-- Fasilitas Sekolah Start -->
<div class="skill-and-experience-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Fasilitas Praktik</h3>
                        <p>Dukungan infrastruktur untuk pembelajaran vokasi</p>
                    </div>
                </div> 
            </div>      
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <h4>Workshop Praktik</h4>
                    <p>Bengkel kerja dengan peralatan standar industri untuk praktik siswa.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-laptop-code"></i>
                    </div>
                    <h4>Lab Komputer</h4>
                    <p>Laboratorium komputer dengan spesifikasi tinggi untuk pembelajaran IT.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-network-wired"></i>
                    </div>
                    <h4>Lab Jaringan</h4>
                    <p>Peralatan jaringan komputer untuk praktik TKJ dan RPL.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <h4>Bengkel Otomotif</h4>
                    <p>Bengkel lengkap untuk praktik teknik kendaraan ringan.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-robot"></i>
                    </div>
                    <h4>Lab Mekatronika</h4>
                    <p>Fasilitas praktik untuk teknik mekatronika dan otomasi industri.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-chalkboard-teacher"></i>
                    </div>
                    <h4>Teaching Factory</h4>
                    <p>Unit produksi yang menerapkan sistem kerja industri sebenarnya.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Fasilitas Sekolah -->

<!-- Prestasi Sekolah Start -->
<div class="achievement-area section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Prestasi & Pencapaian</h3>
                        <p>Beberapa bukti kualitas pendidikan kami</p>
                    </div>
                </div> 
            </div>      
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="achievement-box text-center">
                    <div class="achievement-number">
                        <span class="counter" data-count="{{ $profil->tahun_berdiri ? now()->year - $profil->tahun_berdiri : 20 }}">0</span>+
                    </div>
                    <h4>Tahun Pengalaman</h4>
                    <p>Menyelenggarakan pendidikan vokasi berkualitas</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="achievement-box text-center">
                    <div class="achievement-number">
                        <span class="counter" data-count="{{ $profil->jumlah_siswa ?? 800 }}">0</span>+
                    </div>
                    <h4>Siswa Aktif</h4>
                    <p>Calon tenaga kerja terampil yang sedang dibina</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="achievement-box text-center">
                    <div class="achievement-number">
                        <span class="counter" data-count="{{ $profil->jumlah_guru ?? 40 }}">0</span>+
                    </div>
                    <h4>Guru & Instruktur</h4>
                    <p>Tenaga pendidik profesional dan berpengalaman</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Prestasi Sekolah -->

@endsection

@push('scripts')
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>
@endpush
