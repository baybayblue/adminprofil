@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('interface')

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Tentang Sekolah Kami</h1>
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
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <h4>Akademik Unggul</h4>
                    <p>Kurikulum berbasis kompetensi dengan metode pembelajaran modern untuk mengoptimalkan potensi siswa.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity">
                    <div class="single-activity-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h4>Guru Berkualitas</h4>
                    <p>Didukung oleh tenaga pendidik profesional yang berkompeten di bidangnya masing-masing.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity mrg-res-top-md">
                    <div class="single-activity-icon">
                        <i class="fa fa-futbol-o"></i>
                    </div>
                    <h4>Ekstrakurikuler</h4>
                    <p>Beragam kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 activity">
                <div class="single-activity mrg-res-top-md">
                    <div class="single-activity-icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h4>Pendidikan Karakter</h4>
                    <p>Pembentukan karakter siswa melalui nilai-nilai budi pekerti dan keagamaan.</p>
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
                        <h3>Profil Sekolah</h3>
                        <p>Mengenal lebih dekat tentang sekolah kami</p>
                    </div>
                </div> 
            </div>       
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text-container">
                    <p><span>Selamat datang di {{ $profil->nama_sekolah ?? 'Sekolah Kami' }}</span> {{ $profil->sejarah ?? 'Sekolah kami berdiri dengan komitmen untuk memberikan pendidikan terbaik bagi generasi penerus bangsa. Dengan fasilitas yang memadai dan lingkungan yang kondusif, kami bertekad menjadi lembaga pendidikan unggulan di daerah ini.' }}</p>
                    
                    <div class="about-us">
                        <span><i class="fa fa-check"></i> NPSN: {{ $profil->npsn ?? '12345678' }}</span>
                        <span><i class="fa fa-check"></i> Akreditasi: {{ $profil->akreditasi ?? 'A (Unggul)' }}</span>
                        <span><i class="fa fa-check"></i> Tahun Berdiri: {{ $profil->tahun_berdiri ?? '1980' }}</span>
                        <span><i class="fa fa-check"></i> Jumlah Siswa: {{ $profil->jumlah_siswa ?? '500' }} siswa</span>
                        <span><i class="fa fa-check"></i> Jumlah Guru: {{ $profil->jumlah_guru ?? '30' }} guru</span>
                        <span><i class="fa fa-check"></i> Ruang Kelas: {{ $profil->jumlah_ruang_kelas ?? '15' }} ruang</span>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('profil.visi-misi') }}" class="btn btn-primary">
                            <i class="fa fa-book"></i> Baca Visi & Misi Sekolah
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/classroom.jpg') }}" alt="Ruang Kelas" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/lab.jpg') }}" alt="Laboratorium" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/library.jpg') }}" alt="Perpustakaan" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 mb-3">
                        <img src="{{ asset('img/about/sport.jpg') }}" alt="Lapangan Olahraga" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Profil Sekolah -->

<!-- Fasilitas Sekolah Start -->
<div class="skill-and-experience-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Fasilitas Sekolah</h3>
                        <p>Dukungan infrastruktur untuk proses belajar mengajar</p>
                    </div>
                </div> 
            </div>       
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <h4>Ruang Kelas Nyaman</h4>
                    <p>Ruang kelas dilengkapi AC, LCD projector, dan furniture ergonomis untuk kenyamanan belajar.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-flask"></i>
                    </div>
                    <h4>Laboratorium Lengkap</h4>
                    <p>Lab komputer, IPA, dan bahasa dengan peralatan modern untuk praktikum siswa.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <h4>Perpustakaan Digital</h4>
                    <p>Koleksi buku lengkap dengan sistem digital untuk kemudahan akses literatur.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-futbol-o"></i>
                    </div>
                    <h4>Lapangan Olahraga</h4>
                    <p>Lapangan basket, voli, futsal, dan atletik untuk kegiatan olahraga siswa.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-wifi"></i>
                    </div>
                    <h4>Internet Cepat</h4>
                    <p>Jaringan WiFi kecepatan tinggi di seluruh area sekolah untuk menunjang pembelajaran.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="facility-card">
                    <div class="facility-icon">
                        <i class="fa fa-medkit"></i>
                    </div>
                    <h4>Klinik Kesehatan</h4>
                    <p>UKS dengan tenaga medis untuk penanganan kesehatan dasar siswa.</p>
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
                        <h3>Prestasi Sekolah</h3>
                        <p>Beberapa pencapaian yang membanggakan</p>
                    </div>
                </div> 
            </div>       
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="achievement-box text-center">
                    <div class="achievement-number">
                        <span class="counter" data-count="{{ $profil->tahun_berdiri ? now()->year - $profil->tahun_berdiri : 30 }}">0</span>+
                    </div>
                    <h4>Tahun Pengalaman</h4>
                    <p>Melayani dunia pendidikan dengan dedikasi tinggi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="achievement-box text-center">
                    <div class="achievement-number">
                        <span class="counter" data-count="{{ $profil->jumlah_siswa ?? 500 }}">0</span>+
                    </div>
                    <h4>Siswa Aktif</h4>
                    <p>Generasi penerus bangsa yang sedang dibina</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="achievement-box text-center">
                    <div class="achievement-number">
                        <span class="counter" data-count="{{ $profil->jumlah_guru ?? 30 }}">0</span>+
                    </div>
                    <h4>Guru Profesional</h4>
                    <p>Tenaga pendidik yang berdedikasi tinggi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Prestasi Sekolah -->

@endsection

@push('styles')
<style>
    .facility-card {
        background: #fff;
        padding: 30px 20px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
        transition: all 0.3s ease;
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
</style>
@endpush

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