@extends('layouts.app')
@section('title', 'Galeri Video')

@push('styles')
<style>
    /* Menyamakan ukuran semua thumbnail di galeri */
    .single-items .overlay-effect > a {
        display: block;
        height: 260px;
        background-color: #f0f0f0;
    }

    .single-items .overlay-effect img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endpush

@section('interface')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area gallery"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Galeri Video</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Galeri Video</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--Gallery Area Start-->
    <div class="gallery-area section-padding gallery-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-menu">
                        <ul>
                            <li class="filter" data-filter="all">Semua</li>
                            {{-- Loop untuk membuat tombol filter secara dinamis dari judul --}}
                            @foreach ($filterJudul as $judul)
                                {{-- Str::slug mengubah "Judul Kegiatan" menjadi "judul-kegiatan" --}}
                                <li class="filter" data-filter=".{{ Str::slug($judul) }}">{{ $judul }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filter-items">
                <div class="row">
                    @forelse ($semuaVideo as $video)
                        {{-- Class 'mix' dan class dari judul digunakan oleh javascript filter --}}
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items {{ Str::slug($video->judul) }} overlay-hover">
                            <div class="overlay-effect">
                                @php
                                    // Logika untuk menentukan URL thumbnail
                                    $thumbnailUrl = 'https://placehold.co/400x300/EFEFEF/AAAAAA&text=Video'; // Default

                                    // 1. Prioritaskan thumbnail yang diunggah manual
                                    if ($video->thumbnail) {
                                        $thumbnailUrl = asset('storage/' . $video->thumbnail);
                                    } 
                                    // 2. Jika tidak ada, coba ambil dari YouTube
                                    elseif (preg_match('/(?:\?v=|\/embed\/|\.be\/)([a-zA-Z0-9_-]{11})/', $video->file, $matches)) {
                                        if (isset($matches[1])) {
                                            $thumbnailUrl = 'https://img.youtube.com/vi/' . $matches[1] . '/mqdefault.jpg';
                                        }
                                    }
                                @endphp

                                <a href="#">
                                    {{-- Tampilkan thumbnail yang sudah ditentukan --}}
                                    <img src="{{ $thumbnailUrl }}" alt="{{ $video->judul }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Video';">
                                </a>
                                <div class="gallery-hover-effect">
                                    {{-- Link ini untuk memutar video saat ikon di-klik --}}
                                    <a class="gallery-icon venobox" data-vbtype="video" href="{{ $video->file }}"><i class="fa fa-video-camera"></i></a>
                                    <span class="gallery-text">{{ $video->judul }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <div class="alert alert-info">
                                Belum ada video di galeri.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!--End of Gallery Area-->
@endsection
