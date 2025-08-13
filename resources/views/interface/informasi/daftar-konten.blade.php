@extends('layouts.app')
@section('title', $judulHalaman)

@push('styles')
<style>
    .single-blog-image img {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
    .single-blog-item {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .single-blog-text {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .single-blog-text p {
        flex-grow: 1;
    }
</style>
@endpush

@section('interface')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area blog"
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
    <!--End of Breadcrumb Banner Area-->

    <!--Blog Fullwidth Area Start-->
    <div class="blog-fullwidth-area section-padding blog-two">
        <div class="container">
            <div class="row">
                @forelse ($kontens as $konten)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-item overlay-hover">
                            <div class="single-blog-image">
                                <div class="overlay-effect">
                                    <a href="{{ route($konten->jenis . '.detail', $konten->slug) }}">
                                        <img src="{{ asset('storage/' . $konten->gambar) }}" alt="{{ $konten->judul }}"
                                             onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">
                                        <span class="class-date">{{ $konten->tgl_publikasi->format('M d') }} <span>{{ $konten->tgl_publikasi->format('Y') }}</span></span>
                                    </a>
                                </div>   
                            </div>
                            <div class="single-blog-text">
                                <h4><a href="{{ route($konten->jenis . '.detail', $konten->slug) }}">{{ $konten->judul }}</a></h4>
                                <div class="blog-date">
                                    <span><i class="fa fa-calendar"></i>{{ $konten->tgl_publikasi->format('d F, Y') }}</span>
                                </div>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($konten->isi), 100, '...') }}</p>
                                <a href="{{ route($konten->jenis . '.detail', $konten->slug) }}">Baca selengkapnya...</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            Belum ada {{ strtolower($judulHalaman) }} yang dipublikasikan.
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-content">
                        <div class="pagination-button">
                            {{-- Menampilkan link pagination --}}
                            {{ $kontens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Blog Fullwidth Area-->
@endsection
