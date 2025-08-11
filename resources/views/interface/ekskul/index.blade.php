@extends('layouts.app')
@section('title', 'Kegiatan Ekstrakurikuler')
@section('interface')

<!-- Breadcrumb Banner Area Start -->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Kegiatan Ekstrakurikuler</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Ekstrakurikuler</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Breadcrumb Banner Area -->

<!-- Ekstrakurikuler List Area Start -->
<div class="class-list-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="class-menu">
                    <div class="search-container">
                        <form action="{{ route('ekskul.search') }}" method="GET">
                            <input type="text" name="search" placeholder="Cari kegiatan..." value="{{ request('search') }}">
                            <button type="submit" class="submit"><i class="fa fa-search"></i></button>
                        </form>                               
                    </div>  
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                @forelse($posts as $post)
                <div class="class-list-item mb-4">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-6">
                            <a href="{{ route('ekskul.detail', $post->id) }}">
                                @if($post->foto_kegiatan)
                                    <img src="{{ asset('storage/'.$post->foto_kegiatan) }}" alt="{{ $post->nama_kegiatan }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('img/ekskul/default.jpg') }}" alt="Default" class="img-fluid">
                                @endif
                            </a>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6">
                            <div class="class-list-text">
                                <h3><a href="{{ route('ekskul.detail', $post->id) }}">{{ $post->nama_kegiatan }}</a></h3>
                                <div class="class-information">
                                    <span><i class="fa fa-tag"></i> {{ $post->ekstrakurikuler->nama_eskul }}</span>
                                    <span><i class="fa fa-calendar"></i> {{ $post->created_at->format('d M Y') }}</span>
                                </div>
                                <p>{{ Str::limit($post->deskripsi, 200) }}</p>
                                <a href="{{ route('ekskul.detail', $post->id) }}" class="button-default">Selengkapnya <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    Belum ada kegiatan ekstrakurikuler yang tersedia.
                </div>
                @endforelse
                
                @if($posts->hasPages())
                <div class="pagination-content">
                    <div class="pagination-button">
                        {{ $posts->links() }}
                    </div>
                </div>
                @endif
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="single-widget-item res-mrg-top-xs">
                    <div class="single-title">
                        <h3>Daftar Ekstrakurikuler</h3>
                    </div>
                    <div class="single-widget-container">
                        <ul class="sidebar-categories class">
                            @foreach($ekskuls as $ekskul)
                            <li>
                                <a href="{{ route('ekskul.filter', $ekskul->id) }}">
                                    {{ $ekskul->nama_eskul }}
                                    <span class="badge bg-primary float-end">{{ $ekskul->posts_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="single-widget-item">
                    <div class="single-title">
                        <h3>Kegiatan Terbaru</h3>
                    </div>
                    <div class="single-widget-container">
                        @foreach($recentPosts as $recent)
                        <div class="recent-post-item">
                            <div class="recent-post-image">
                                <a href="{{ route('ekskul.detail', $recent->id) }}">
                                    @if($recent->foto_kegiatan)
                                        <img src="{{ asset('storage/'.$recent->foto_kegiatan) }}" alt="{{ $recent->nama_kegiatan }}">
                                    @else
                                        <img src="{{ asset('img/ekskul/default-small.jpg') }}" alt="Default">
                                    @endif
                                </a>
                            </div>
                            <div class="recent-post-text">
                                <h4><a href="{{ route('ekskul.detail', $recent->id) }}">{{ Str::limit($recent->nama_kegiatan, 30) }}</a></h4>
                                <span><i class="fa fa-calendar"></i> {{ $recent->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="single-widget-item hidden-sm">
                    <div class="single-widget-container">
                        <a href="{{ route('ekskul.daftar') }}">
                            <img src="{{ asset('img/banner/daftar-ekskul.jpg') }}" alt="Daftar Ekstrakurikuler">
                            <span>Daftar Ekstrakurikuler</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Ekstrakurikuler List Area -->

@endsection