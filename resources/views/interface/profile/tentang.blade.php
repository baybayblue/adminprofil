@extends('layouts.app')
@section('title', 'Tentang Sekolah')

@section('interface')

@if ($profil)
    
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Tentang {{ $profil->nama_sekolah }}</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Tentang Kami</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="activity-area">
        <div class="container">
            <div class="row">
                {{-- Menampilkan Tahun Berdiri --}}
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <h4>Tahun Berdiri</h4>
                        <p>Didirikan pada tahun <br><strong>{{ $profil->tahun_berdiri }}</strong></p>
                    </div>
                </div>
                {{-- Menampilkan Akreditasi --}}
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon">
                            <i class="fa fa-star"></i>
                        </div>
                        <h4>Akreditasi</h4>
                        <p>Terakreditasi dengan peringkat <br><strong>{{ $profil->akreditasi }}</strong></p>
                    </div>
                </div>
                {{-- Menampilkan NPSN --}}
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon">
                            <i class="fa fa-university"></i>
                        </div>
                        <h4>NPSN</h4>
                        <p>Nomor Pokok Sekolah Nasional <br><strong>{{ $profil->npsn }}</strong></p>
                    </div>
                </div>
                {{-- Menampilkan Info Kontak --}}
                 <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <h4>Kontak</h4>
                        <p>Telepon: <strong>{{ $profil->no_telp }}</strong> <br>Email: <strong>{{ $profil->email }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Sejarah Singkat</h3>
                            <p>Perjalanan {{ $profil->nama_sekolah }} dari awal hingga kini</p>
                        </div>
                    </div>  
                </div>      
            </div>
            <div class="row" style="align-items: center;">
                <div class="col-lg-6">
                     <div class="skill-image">
                        {{-- Menampilkan Logo Sekolah sebagai gambar utama sejarah --}}
                        <img src="{{ asset('storage/' . $profil->logo) }}" alt="Logo {{ $profil->nama_sekolah }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text-container">
                        {{-- Menggunakan {!! !!} agar format teks dari editor (paragraf, dll) terbaca --}}
                        {!! $profil->sejarah !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="skill-and-experience-area" style="background-color: #f9f9f9;">
         <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Sambutan Kepala Sekolah</h3>
                            <p>Pesan hangat dari <strong>{{ $profil->kepala_sekolah }}</strong></p>
                        </div>
                    </div>  
                </div>      
            </div>
            <div class="row" style="align-items: center;">
                <div class="col-lg-8">
                     <div class="about-text-container">
                        {!! $profil->sambutan_kepala !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-teachers-column text-center">
                         <div class="teachers-image-column">
                            {{-- Menampilkan Foto Kepala Sekolah --}}
                            <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}" alt="Foto {{ $profil->kepala_sekolah }}">
                        </div>
                        <div class="teacher-column-carousel-text" style="padding: 15px;">
                            <h4>{{ $profil->kepala_sekolah }}</h4>
                            <span>Kepala Sekolah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="teachers-column-carousel-area section-padding">
        <div class="container">
             <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Lokasi & Kontak</h3>
                             <p>Kunjungi kami atau hubungi kami melalui informasi di bawah ini.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{-- Menampilkan Google Maps dari database --}}
                    <div class="google-maps">
                         {!! $profil->maps !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
     @else
    {{-- Tampilan alternatif jika data profil sekolah tidak ditemukan --}}
    <div class="container text-center" style="padding: 150px 0;">
        <h2>Profil Sekolah Belum Tersedia</h2>
        <p>Maaf, data mengenai profil sekolah belum diisi. Silakan hubungi administrator.</p>
    </div>
@endif

@endsection