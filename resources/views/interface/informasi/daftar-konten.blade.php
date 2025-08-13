@extends('layouts.app')
@section('title', $judulHalaman)
@section('interface')
    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'konten'.
    -->
    <div class="breadcrumb-banner-area"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">{{ $judulHalaman }}</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>{{ $judulHalaman }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="class-list-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    @forelse ($kontens as $konten)
                    <div class="class-list-item">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-6">
                                {{-- Link ini akan otomatis ke 'berita.detail' atau 'artikel.detail' --}}
                                <a href="{{ route($konten->jenis . '.detail', $konten->slug) }}">
                                    <img src="{{ asset('storage/' . $konten->gambar) }}" alt="{{ $konten->judul }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">
                                </a>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-6">
                                <div class="class-list-text">
                                    <h3><a href="{{ route($konten->jenis . '.detail', $konten->slug) }}">{{ $konten->judul }}</a></h3>
                                    <div class="class-information">
                                        <span>Tanggal Publikasi: {{ $konten->tgl_publikasi->format('d F Y') }}</span>
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($konten->isi), 200, '...') }}</p>
                                    <a href="{{ route($konten->jenis . '.detail', $konten->slug) }}" class="button-default">Read More <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            Belum ada {{ strtolower($judulHalaman) }} yang dipublikasikan.
                        </div>
                    </div>
                    @endforelse
                    
                    <div class="pagination-content">
                        <div class="pagination-button">
                           {{ $kontens->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    {{-- Sidebar bisa Anda isi di sini, misalnya dengan daftar kategori atau berita terbaru --}}
                    {{-- @include('partials.sidebar') Contoh jika Anda punya file sidebar terpisah --}}
                </div>
            </div>
        </div>
    </div>
@endsection
