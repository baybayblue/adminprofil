@extends('layouts.app')
@section('title', 'Visi & Misi') {{-- Judul halaman di tab browser --}}

@section('interface')

    <div class="breadcrumb-banner-area">
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
    <div class="class-details-area section-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    {{-- Judul utama halaman --}}
                    <h1>Visi & Misi {{ $profil->nama_sekolah ?? 'Sekolah' }}</h1>

                    <div class="class-details-tab">
                        <div class="class-details-tab-menu">
                            <ul role="tablist" class="nav nav-tabs">
                                {{-- Tab untuk Visi --}}
                                <li role="presentation">
                                    <a class="active" data-bs-toggle="tab" role="tab" aria-controls="visi"
                                        href="#visi">
                                        <i class="fa fa-eye"></i> Visi
                                    </a>
                                </li>
                                {{-- Tab untuk Misi --}}
                                <li role="presentation">
                                    <a data-bs-toggle="tab" role="tab" aria-controls="misi" href="#misi">
                                        <i class="fa fa-bullseye"></i> Misi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tab-content">
                            {{-- Konten untuk Tab Visi --}}
                            <div id="visi" class="tab-pane active" role="tabpanel">
                                <h3>VISI SEKOLAH</h3>
                                {{-- Menggunakan {!! !!} agar bisa render tag HTML seperti <p>, <li>, dll. --}}
                                {!! $profil->visi !!}
                            </div>

                            {{-- Konten untuk Tab Misi --}}
                            <div id="misi" class="tab-pane" role="tabpanel">
                                <h3>MISI SEKOLAH</h3>
                                {!! $profil->misi !!}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sidebar untuk info tambahan --}}
                <div class="col-xl-3 col-lg-4">
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
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Kepala Sekolah</h3>
                        </div>
                        <div class="single-widget-container">
                            <div class="teacher-info-widget">
                                <div class="widget-image">
                                    {{-- Pastikan path gambar benar dan file ada di storage/app/public --}}
                                    <a href="#"><img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}"
                                            alt="Foto Kepala Sekolah"></a>
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
