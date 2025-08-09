@extends('layouts.app')
@section('title', 'Galeri')
@section('interface')

    <div class="breadcrumb-banner-area gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Gallery</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Gallery</li>
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
                            <li class="filter" data-filter="all">All</li>
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
                                    <a href="#"><img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}"></a>
                                    <div class="gallery-hover-effect">
                                        {{-- Link ke gambar asli untuk lightbox (venobox) --}}
                                        <a class="gallery-icon venobox" href="{{ asset('storage/' . $item->file) }}"><i class="fa fa-image"></i></a>
                                        <span class="gallery-text">{{ $item->judul }}</span>
                                    </div>
                                @else
                                    {{-- Tampilan untuk VIDEO --}}
                                    {{-- Asumsi kita menggunakan placeholder, karena video tidak bisa langsung ditampilkan di <img> --}}
                                    <a href="#"><img src="https://via.placeholder.com/400x300.png?text=Video" alt="{{ $item->judul }}"></a>
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
                            <p>Belum ada item di galeri.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Tombol Load More bisa kamu fungsikan nanti dengan pagination/javascript --}}
                {{-- <div class="col-md-12">
                    <div class="button text-center">
                        <a class="button-default button-yellow" href="#"><i class="fa fa-refresh"></i>Load More</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @endsection