@extends('layouts.app')
@section('title', 'Tentang Sekolah')

@push('styles')
<style>
    .about-us span {
        display: block;
        margin-bottom: 8px;
    }
    .about-us i {
        color: #f39c12;
        margin-right: 10px;
    }
    .skill-image img {
        border-radius: 8px;
        width: 100%;
    }
</style>
@endpush

@section('interface')

<!-- Breadcrumb Banner Area Start -->
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
                    {{-- <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . ($profil->logo ?? 'default/logo.png')) }}" alt="Logo SMK" class="img-fluid" style="max-height: 150px;">
                    </div>
                     --}}
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
                <div class="skill-image">
                    {{-- GAMBAR GEDUNG SEKARANG DINAMIS --}}
                    <img src="{{ $profil->foto_gedung ? asset('storage/' . $profil->foto_gedung) : asset('img/banner/7.jpg') }}" 
                         alt="Gedung Sekolah" class="img-fluid rounded shadow"
                         onerror="this.onerror=null;this.src='https://placehold.co/600x400/EFEFEF/AAAAAA&text=Gedung+Sekolah';">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Profil Sekolah -->

@endsection

@push('scripts')
{{-- Script counterup tidak lagi diperlukan di halaman ini --}}
@endpush
