@extends('layouts.app')
@section('title', $pengumuman->judul_pengumuman) {{-- Judul halaman dinamis --}}
@section('interface')

<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Detail Pengumuman</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                            <li>Detail</li>
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
                <div class="class-list-item">
                    <div class="class-list-text" style="width: 100%;">
                        <h2>{{ $pengumuman->judul_pengumuman }}</h2>
                        <div class="class-information mb-4">
                             <span><i class="fa fa-calendar"></i> Dipublikasikan: {{ $pengumuman->tanggal_publikasi->format('d F Y, H:i') }} WIB</span>
                        </div>
                        {{-- Tampilkan isi lengkap pengumuman, izinkan HTML --}}
                        <div class="announcement-content">
                            {!! $pengumuman->isi_pengumuman !!}
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Sidebar yang sama dengan halaman daftar --}}
            <div class="col-xl-3 col-lg-4">
                <div class="single-widget-item">
                    <div class="single-title">
                        <h3>Pengumuman Terbaru</h3>
                    </div>
                    <div class="single-widget-container">
                        @foreach($recentPengumumans as $recent)
                        <div class="recent-post-item">
                            <div class="recent-post-image">
                                <a href="{{ route('pengumuman.show', $recent->id) }}"><img src="{{ asset('img/gallery/15.jpg') }}" alt=""></a>
                            </div>
                            <div class="recent-post-text">
                                <h4><a href="{{ route('pengumuman.show', $recent->id) }}">{{ $recent->judul_pengumuman }}</a></h4>
                                <span><i class="fa fa-calendar"></i>{{ $recent->tanggal_publikasi->format('d F Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection