@extends('layouts.app')
@section('title', 'Pengumuman Sekolah')
@section('interface')

@php
    use Illuminate\Support\Str;
@endphp

{{-- CSS Khusus untuk Halaman Pengumuman --}}
@push('styles')
<style>
    /* Variabel Warna untuk kemudahan kustomisasi */
    :root {
        --primary-color: #007bff; /* Warna utama, sesuaikan dengan tema Anda */
        --light-gray-bg: #f8f9fa;
        --border-color: #e9ecef;
        --text-color-dark: #343a40;
        --text-color-light: #6c757d;
    }

    .pengumuman-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid var(--border-color);
    }

    .pengumuman-item:last-child {
        border-bottom: none;
    }

    .pengumuman-tanggal {
        flex-shrink: 0;
        width: 80px;
        height: 80px;
        background-color: var(--light-gray-bg);
        border-radius: 8px;
        text-align: center;
        font-weight: bold;
        color: var(--text-color-light);
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-right: 25px;
        border: 1px solid var(--border-color);
    }

    .pengumuman-tanggal .hari {
        font-size: 32px;
        line-height: 1;
        color: var(--primary-color);
    }

    .pengumuman-tanggal .bulan {
        font-size: 16px;
        text-transform: uppercase;
        line-height: 1;
        margin-top: 5px;
    }

    .pengumuman-konten h3 {
        margin-top: 0;
        margin-bottom: 8px;
    }

    .pengumuman-konten h3 a {
        color: var(--text-color-dark);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .pengumuman-konten h3 a:hover {
        color: var(--primary-color);
    }

    .pengumuman-konten .meta-info {
        color: var(--text-color-light);
        margin-bottom: 15px;
        font-size: 0.9em;
    }
</style>
@endpush


<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Pengumuman Sekolah</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Pengumuman</li>
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
            {{-- Kolom Konten Utama --}}
            <div class="col-xl-9 col-lg-8">

                {{-- Menggunakan @forelse untuk loop yang lebih bersih --}}
                @forelse($pengumumans as $pengumuman)
                    <div class="pengumuman-item">
                        {{-- Kiri: Ikon Tanggal --}}
                        <div class="pengumuman-tanggal">
                            <span class="hari">{{ $pengumuman->tanggal_publikasi->format('d') }}</span>
                            <span class="bulan">{{ $pengumuman->tanggal_publikasi->format('M') }}</span>
                        </div>

                        {{-- Kanan: Konten Teks --}}
                        <div class="pengumuman-konten">
                            <h3>
                                <a href="{{ route('pengumuman.show', $pengumuman->id) }}">{{ $pengumuman->judul_pengumuman }}</a>
                            </h3>
                            <div class="meta-info">
                                <span><i class="fa fa-calendar"></i> Dipublikasikan pada {{ $pengumuman->tanggal_publikasi->format('d F Y') }}</span>
                            </div>
                            <p>{!! Str::limit(strip_tags($pengumuman->isi_pengumuman), 200, '...') !!}</p>
                            <a href="{{ route('pengumuman.show', $pengumuman->id) }}" class="button-default">Baca Selengkapnya <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                @empty
                    {{-- Tampilan jika tidak ada pengumuman --}}
                    <div class="alert alert-info text-center">
                        Saat ini belum ada pengumuman untuk ditampilkan.
                    </div>
                @endforelse

                {{-- Navigasi Paginasi --}}
                <div class="pagination-content">
                    <div class="pagination-button">
                        {{ $pengumumans->links() }}
                    </div>
                </div>

            </div>

            {{-- Kolom Sidebar --}}
            <div class="col-xl-3 col-lg-4">
                <div class="single-widget-item">
                    <div class="single-title">
                        <h3>Pengumuman Terbaru</h3>
                    </div>
                    <div class="single-widget-container">
                        @foreach($recentPengumumans as $recent)
                            <div class="recent-post-item">
                                <div class="recent-post-image">
                                    <a href="{{ route('pengumuman.show', $recent->id) }}">
                                        <img src="{{ asset('img/gallery/15.jpg') }}" alt="Gambar ilustrasi pengumuman">
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h4><a href="{{ route('pengumuman.show', $recent->id) }}">{{ $recent->judul_pengumuman }}</a></h4>
                                    <span><i class="fa fa-calendar"></i> {{ $recent->tanggal_publikasi->format('d M Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Widget lainnya bisa ditambahkan di sini --}}
            </div>
        </div>
    </div>
</div>
@endsection