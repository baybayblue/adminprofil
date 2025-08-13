@extends('layouts.app')
@section('title', 'Detail Guru: ' . $guru->nama)

@push('styles')
<style>
    .teacher-details-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 5px;
    }
    .teacher-details-info {
        margin-top: 20px;
    }
    /* Style untuk merapikan info detail */
    .teacher-info-text span {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        font-size: 16px;
    }
    .teacher-info-text span i {
        width: 30px; /* Memberi ruang tetap untuk ikon */
        text-align: center;
        margin-right: 15px;
        font-size: 1.3em;
        color: #00b5b5; /* Warna disesuaikan dengan tema */
    }
</style>
@endpush

@section('interface')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area teachers"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Profil Guru</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li><a href="{{ route('guru.tampil') }}">Guru & Staf</a></li>
                                <li>{{ $guru->nama }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--Teacher Details Area Start-->
    <div class="teacher-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="teacher-details-image">
                        <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : 'https://placehold.co/300x300/EFEFEF/AAAAAA?text=%EF%80%87&font=fontawesome' }}" 
                             alt="{{ $guru->nama }}"
                             onerror="this.onerror=null;this.src='https://placehold.co/300x300/EFEFEF/AAAAAA?text=%EF%80%87&font=fontawesome';">
                        <div class="social-links">
                            @if($guru->facebook_url) <a href="{{ $guru->facebook_url }}" target="_blank"><i class="fa fa-facebook"></i></a> @endif
                            @if($guru->instagram_url) <a href="{{ $guru->instagram_url }}" target="_blank"><i class="fa fa-instagram"></i></a> @endif
                            @if($guru->linkedin_url) <a href="{{ $guru->linkedin_url }}" target="_blank"><i class="fa fa-linkedin"></i></a> @endif
                        </div>
                    </div>
                    <div class="teacher-details-info">
                        <h4>{{ $guru->nama }}</h4>
                        <span>{{ $guru->jabatan }}</span>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="teacher-about-info">
                        <div class="single-title">
                            <h3>Profil Lengkap</h3>
                        </div>
                        <div class="teacher-info-text">
                            <span><i class="fa fa-id-card"></i> <strong>NUPTK:</strong> {{ $guru->nuptk ?? '-' }}</span>
                            <span><i class="fa fa-briefcase"></i> <strong>Jabatan:</strong> {{ $guru->jabatan ?? '-' }}</span>
                            @if($guru->jurusan)
                            <span><i class="fa fa-graduation-cap"></i> <strong>Mengajar di Jurusan:</strong> {{ $guru->jurusan->nama_jurusan }}</span>
                            @endif
                        </div>
                        <p>Informasi lebih lanjut mengenai profil, pengalaman, atau deskripsi singkat tentang guru dapat ditambahkan di sini. Saat ini bagian ini belum memiliki data dari database.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Teacher Details Area-->
@endsection
