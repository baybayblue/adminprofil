@extends('layouts.app')
@section('title', 'Galeri')

@push('styles')
<style>
    /* PERBAIKAN: Membuat area gambar memiliki ukuran yang konsisten */
    .single-items .overlay-effect > a {
        display: block;
        height: 260px; /* Atur tinggi yang sama untuk semua area gambar */
        background-color: #f0f0f0; /* Warna latar belakang jika gambar gagal dimuat */
    }

    /* Menyamakan ukuran semua gambar di galeri */
    .single-items .overlay-effect img {
        width: 100%;
        height: 100%; /* Ubah tinggi menjadi 100% untuk mengisi area container */
        object-fit: cover; /* Memastikan gambar terisi penuh tanpa distorsi */
    }
</style>
@endpush

@section('interface')

    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'galeri'.
    -->
    <div class="breadcrumb-banner-area gallery"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Galeri</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Galeri</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-area section-padding gallery-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-menu">
                        <ul>
                            <li class="filter" data-filter="all">Semua</li>
                            <li class="filter" data-filter=".foto">Foto</li>
                            <li class="filter" data-filter=".video">Video</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filter-items">
                <div class="row">
                    @forelse ($galeriItems as $item)
                        {{-- Class 'mix' dan '{{ $item->tipe }}' digunakan oleh javascript filter --}}
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items {{ $item->tipe }} overlay-hover">
                            <div class="overlay-effect">

                                {{-- Cek tipe item, apakah foto atau video --}}
                                @if ($item->tipe == 'foto')
                                    {{-- Tampilan untuk FOTO --}}
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}"
                                             onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Foto';">
                                    </a>
                                    <div class="gallery-hover-effect">
                                        {{-- Link ke gambar asli untuk lightbox (venobox) --}}
                                        <a class="gallery-icon venobox" href="{{ asset('storage/' . $item->file) }}"><i class="fa fa-image"></i></a>
                                        <span class="gallery-text">{{ $item->judul }}</span>
                                    </div>
                                @else
                                    {{-- Tampilan untuk VIDEO (KODE YANG DIPERBARUI) --}}
                                    @php
                                        // Logika untuk menentukan URL thumbnail
                                        $thumbnailUrl = 'https://placehold.co/400x300/EFEFEF/AAAAAA&text=Video'; // Default placeholder

                                        // 1. Prioritaskan thumbnail yang diunggah manual
                                        if ($item->thumbnail) {
                                            $thumbnailUrl = asset('storage/' . $item->thumbnail);
                                        } 
                                        // 2. Jika tidak ada, coba ambil dari YouTube
                                        elseif (preg_match('/(?:\?v=|\/embed\/|\.be\/)([a-zA-Z0-9_-]{11})/', $item->file, $matches)) {
                                            if (isset($matches[1])) {
                                                // Ambil gambar kualitas medium dari YouTube
                                                $thumbnailUrl = 'https://img.youtube.com/vi/' . $matches[1] . '/mqdefault.jpg';
                                            }
                                        }
                                    @endphp

                                    <a href="#">
                                        {{-- Tampilkan thumbnail yang sudah ditentukan --}}
                                        <img src="{{ $thumbnailUrl }}" alt="{{ $item->judul }}"
                                             onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Video';">
                                    </a>
                                    <div class="gallery-hover-effect">
                                        {{-- Link ini untuk memutar video saat ikon di-klik (Typo 'class.' diperbaiki) --}}
                                        <a class="gallery-icon venobox" data-vbtype="video" href="{{ $item->file }}"><i class="fa fa-video-camera"></i></a>
                                        <span class="gallery-text">{{ $item->judul }}</span>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @empty
                        {{-- Pesan jika tidak ada data sama sekali di database --}}
                        <div class="col-md-12 text-center">
                            <div class="alert alert-info">
                                Belum ada item di galeri.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
