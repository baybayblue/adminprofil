@extends('layouts.app')
@section('title', 'Kontak Kami') {{-- Judul halaman diubah --}}
@section('interface')

{{-- Bagian Banner Atas --}}
<div class="breadcrumb-banner-area gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Kontak Kami</h1> {{-- Teks diubah --}}
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Kontak</li> {{-- Breadcrumb diubah --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Bagian Konten Utama --}}
<div class="contact-area section-padding">
    <div class="container">
        {{-- Pengecekan apakah data profil ada --}}
        @if($profil)
        <div class="row">
            {{-- Kolom untuk Peta Google Maps --}}
            <div class="col-md-12 col-lg-7">
                <div class="contact-map">
                    {{-- Menampilkan embed map dari database. Gunakan {!! !!} agar tag HTML dirender --}}
                    {!! $profil->maps !!}
                </div>
            </div>

            {{-- Kolom untuk Informasi Kontak --}}
            <div class="col-md-12 col-lg-5">
                <div class="contact-info">
                    <h3>Informasi Kontak</h3>
                    <p>Hubungi kami melalui detail di bawah ini untuk informasi lebih lanjut mengenai sekolah kami.</p>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> <strong>Alamat:</strong><br>{{ $profil->alamat }}</li>
                        <li><i class="fa fa-phone"></i> <strong>Telepon:</strong><br>{{ $profil->no_telp }}</li>
                        <li><i class="fa fa-envelope"></i> <strong>Email:</strong><br><a href="mailto:{{ $profil->email }}">{{ $profil->email }}</a></li>
                    </ul>
                    
                    {{-- Tautan Media Sosial --}}
                    <div class="social-media-links mt-4">
                        <h4>Ikuti Kami:</h4>
                        @if($profil->facebook_url)
                            <a href="{{ $profil->facebook_url }}" target="_blank" class="mr-2"><i class="fa fa-facebook-square fa-2x"></i></a>
                        @endif
                        @if($profil->instagram_url)
                            <a href="{{ $profil->instagram_url }}" target="_blank" class="mr-2"><i class="fa fa-instagram fa-2x"></i></a>
                        @endif
                        @if($profil->youtube_url)
                            <a href="{{ $profil->youtube_url }}" target="_blank"><i class="fa fa-youtube-play fa-2x"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        {{-- Tampilan jika tidak ada data profil sekolah --}}
        <div class="col-md-12 text-center">
            <div class="alert alert-info">
                Informasi kontak sekolah belum tersedia.
            </div>
        </div>
        @endif
    </div>
</div>
@endsection