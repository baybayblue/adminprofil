
@extends('layouts.app')
@section('title', $judulHalaman)
@section('interface')
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">{{ $judulHalaman }}</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
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
                                    <img src="{{ asset('storage/' . $konten->gambar) }}" alt="{{ $konten->judul }}">
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
                        <p class="text-center">Belum ada {{ strtolower($judulHalaman) }} yang dipublikasikan.</p>
                    </div>
                    @endforelse
                    
                    <div class="pagination-content">
                        <div class="pagination-button">
                           {{ $kontens->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    {{-- Sidebar bisa kamu isi di sini --}}
                </div>
            </div>
        </div>
    </div>
    @endsection