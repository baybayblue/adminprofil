{{-- Menggunakan layout utama dari aplikasi --}}
@extends('layouts.app')

{{-- Menetapkan judul halaman untuk tab browser --}}
@section('title', 'Visi & Misi')

{{-- Memulai bagian konten utama yang akan ditampilkan di dalam layout --}}
@section('interface')

    <!-- Area Breadcrumb dan Banner Halaman -->
    <div class="breadcrumb-banner-area"
        style="background-image: url('{{ $background && $background->gambar ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Visi & Misi</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Profil</li>
                                <li>Visi & Misi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Area Breadcrumb -->

    <!-- Area Detail Konten -->
    <div class="class-details-area section-padding-top">
        <div class="container">
            <div class="row">
                <!-- Kolom Konten Utama (Visi & Misi) -->
                <div class="col-xl-9 col-lg-8">
                    <h1>Visi & Misi {{ $profil->nama_sekolah ?? 'Sekolah' }}</h1>

                    <!-- Navigasi Tab untuk Visi dan Misi -->
                    <div class="class-details-tab">
                        <div class="class-details-tab-menu">
                            <ul role="tablist" class="nav nav-tabs">
                                <li role="presentation">
                                    <a class="active" data-bs-toggle="tab" role="tab" aria-controls="visi"
                                        href="#visi">
                                        <i class="fa fa-eye"></i> Visi
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a data-bs-toggle="tab" role="tab" aria-controls="misi" href="#misi">
                                        <i class="fa fa-bullseye"></i> Misi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>

                        <!-- Konten Tab -->
                        <div class="tab-content">
                            <div id="visi" class="tab-pane active" role="tabpanel">
                                <h3>VISI SEKOLAH</h3>
                                {!! $profil->visi !!}
                            </div>

                            <div id="misi" class="tab-pane" role="tabpanel">
                                <h3>MISI SEKOLAH</h3>
                                {!! $profil->misi !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Sidebar untuk Informasi Tambahan -->
                <div class="col-xl-3 col-lg-4">
                    <!-- Widget Informasi Sekolah -->
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Informasi Sekolah</h3>
                        </div>
                        <div class="single-widget-container">
                            <ul class="class-infos">
                                <li><i class="fa fa-star"></i>Akreditasi: {{ $profil->akreditasi ?? '-' }}</li>
                                <li><i class="fa fa-calendar"></i>Berdiri: {{ $profil->tahun_berdiri ?? '-' }}</li>
                                <li><i class="fa fa-phone"></i>Telepon: {{ $profil->no_telp ?? '-' }}</li>
                                <li><i class="fa fa-envelope"></i>Email: {{ $profil->email ?? '-' }}</li>
                                <li><i class="fa fa-map-marker"></i>Alamat: {{ $profil->alamat ?? '-' }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Widget Kepala Sekolah -->
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Kepala Sekolah</h3>
                        </div>
                        <div class="single-widget-container">
                            <div class="teacher-info-widget">
                                <div class="widget-image">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                             alt="Foto Kepala Sekolah"
                                             onerror="this.onerror=null;this.src='https://placehold.co/300x300/EFEFEF/AAAAAA&text=%EF%80%87&font=fontawesome';">
                                    </a>
                                </div>
                                <div class="widget-infos">
                                    <h4><a href="#">{{ $profil->kepala_sekolah ?? 'Nama Kepala Sekolah' }}</a></h4>
                                    <p>Kepala Sekolah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
