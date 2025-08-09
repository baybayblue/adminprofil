@extends('layouts.app')
@section('title', $artikel->judul) {{-- Mengatur judul tab browser sesuai judul artikel --}}
@section('interface')

    <div class="breadcrumb-banner-area blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Detail Artikel</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                {{-- Link kembali ke halaman daftar artikel --}}
                                <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                                {{-- Menampilkan judul artikel yang sedang aktif (dipotong jika terlalu panjang) --}}
                                <li>{{ \Illuminate\Support\Str::limit($artikel->judul, 35) }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-details-area section-padding blog-two">
        <div class="container">
            <div class="row">
                {{-- Kolom utama untuk konten artikel --}}
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-post-wrapper">
                        <div class="blog-post-details">
                            {{-- Menampilkan Judul Artikel --}}
                            <h1>{{ $artikel->judul }}</h1>
                            {{-- Menampilkan Tanggal Publikasi --}}
                            <span><i class="fa fa-calendar"></i> {{ $artikel->tgl_publikasi->format('d F Y') }}</span>
                        </div>
                        <div class="blog-post-details-img">
                            {{-- Menampilkan Gambar Utama Artikel --}}
                            <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}">
                        </div>
                        <div class="blog-post-details-text">
                            {{-- Menampilkan Isi Artikel. {!! !!} digunakan agar tag HTML bisa dirender --}}
                            {!! $artikel->isi !!}
                        </div>
                        <div class="single-title">
                            <h3>Artikel Terkait</h3>
                        </div>
                        <div class="row">
                            {{-- Melakukan looping untuk menampilkan artikel terkait --}}
                            @forelse ($artikelTerkait as $terkait)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                    <div class="single-blog-item overlay-hover">
                                        <div class="single-blog-image">
                                            <div class="overlay-effect">
                                                <a href="{{ route('artikel.detail', $terkait->slug) }}">
                                                    <img src="{{ asset('storage/' . $terkait->gambar) }}" alt="{{ $terkait->judul }}">
                                                    <span class="class-date">{{ $terkait->tgl_publikasi->format('M d') }} <span>{{ $terkait->tgl_publikasi->format('Y') }}</span></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-blog-text">
                                            <h4><a href="{{ route('artikel.detail', $terkait->slug) }}">{{ $terkait->judul }}</a></h4>
                                            <div class="blog-date">
                                                <span><i class="fa fa-calendar"></i>{{ $terkait->tgl_publikasi->format('d M, Y') }}</span>
                                            </div>
                                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($terkait->isi), 80, '...') }}</p>
                                            <a href="{{ route('artikel.detail', $terkait->slug) }}">Read more.</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p>Tidak ada artikel terkait.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Kolom untuk sidebar --}}
                <div class="col-xl-3 col-lg-4">
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Kategori Lain</h3>
                        </div>
                        <div class="single-widget-container">
                            <ul class="sidebar-categories">
                                {{-- Link ini bisa dibuat dinamis di lain waktu --}}
                                <li><a href="{{ route('berita.index') }}">Berita</a></li>
                                <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                                {{-- <li><a href="#">Pengumuman</a></li>
                                <li><a href="#">Agenda</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    {{-- Kamu bisa menambahkan widget lain di sini sesuai template --}}
                </div>
            </div>
        </div>
    </div>
    @endsection