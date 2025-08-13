@extends('layouts.app')
@section('title', 'Galeri')
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
                                    {{-- Tampilan untuk VIDEO --}}
                                    {{-- Untuk video, thumbnail bisa dibuat dinamis jika ada fiturnya, jika tidak, gunakan placeholder --}}
                                    <a href="#">
                                        <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://placehold.co/400x300/000000/FFFFFF&text=Video' }}" alt="{{ $item->judul }}"
                                             onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Video';">
                                    </a>
                                    <div class="gallery-hover-effect">
                                        {{-- Link ke URL video untuk lightbox (venobox) --}}
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
