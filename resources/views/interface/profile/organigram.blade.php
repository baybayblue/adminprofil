@extends('layouts.app')
@section('title', 'Organigram Sekolah')
@section('interface')

    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'organigram'.
    -->
    <div class="breadcrumb-banner-area gallery" 
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Organigram Sekolah</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Organigram</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-area section-padding gallery-full-width">
        <div class="container">
            <div class="filter-items">
                <div class="row">

                    @forelse ($organigrams as $organigram)
                        {{-- Loop untuk setiap item organigram --}}
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mix single-items overlay-hover">
                            <div class="overlay-effect">
                                {{-- Pastikan gambar tersimpan di folder 'storage' --}}
                                <a href="{{ asset('storage/' . $organigram->gambar) }}">
                                    <img src="{{ asset('storage/' . $organigram->gambar) }}" alt="{{ $organigram->nama_organigram }}" 
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">
                                </a>
                                <div class="gallery-hover-effect">
                                    {{-- Link untuk memperbesar gambar (lightbox) --}}
                                    <a class="gallery-icon venobox" href="{{ asset('storage/' . $organigram->gambar) }}">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    {{-- Menampilkan nama organigram --}}
                                    <span class="gallery-text">{{ $organigram->nama_organigram }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Tampilan jika tidak ada data organigram --}}
                        <div class="col-md-12 text-center">
                            <div class="alert alert-info">
                                Data organigram belum tersedia.
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
