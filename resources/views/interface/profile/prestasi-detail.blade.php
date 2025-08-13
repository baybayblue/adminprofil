@extends('layouts.app')
@section('title', $prestasi->nama_prestasi)

@push('styles')
<style>
    .blog-post-details-img img {
        width: 100%;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .blog-post-details span {
        display: block;
        margin-bottom: 15px;
        color: #777;
    }
    .blog-post-details-text {
        line-height: 1.8;
    }
    /* Style untuk related post */
    .single-blog-image img {
        height: 180px; /* Disesuaikan agar lebih kecil */
        width: 100%;
        object-fit: cover;
    }
    .single-blog-item {
        height: 100%;
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
                        <h1 class="text-center">Detail Prestasi</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li><a href="{{ route('prestasi.tampil') }}">Prestasi</a></li>
                                <li>Detail</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--Blog Details Area Start-->
    <div class="blog-details-area section-padding blog-two">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-post-wrapper">
                        <div class="blog-post-details">
                            <h1>{{ $prestasi->nama_prestasi }}</h1>
                            <span><i class="fa fa-calendar"></i> Diraih pada: {{ $prestasi->created_at->format('d F, Y') }}</span>
                        </div>
                        <div class="blog-post-details-img">
                            <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->nama_prestasi }}"
                                 onerror="this.onerror=null;this.src='https://placehold.co/800x500/EFEFEF/AAAAAA&text=Gambar';">
                        </div>
                        <div class="blog-post-details-text">
                            {{-- Menampilkan deskripsi prestasi dengan tag HTML --}}
                            {!! $prestasi->deskripsi !!}
                        </div> 
                        
                        {{-- Bagian Prestasi Terkait (Sesuai Template) --}}
                        @if($recentPrestasi->count() > 0)
                        <div class="single-title mt-5">
                            <h3>Prestasi Terkait</h3>
                        </div>
                        <div class="row">
                            @foreach($recentPrestasi->take(3) as $related) {{-- Ambil 3 item --}}
                            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                <div class="single-blog-item overlay-hover">
                                    <div class="single-blog-image">
                                        <div class="overlay-effect">
                                            <a href="{{ route('prestasi.detail', $related->id) }}">
                                                <img src="{{ asset('storage/' . $related->foto) }}" alt="{{ $related->nama_prestasi }}">
                                                <span class="class-date">{{ $related->created_at->format('M d') }} <span>{{ $related->created_at->format('Y') }}</span></span>
                                            </a>
                                        </div>    
                                    </div>
                                    <div class="single-blog-text">
                                        <h4><a href="{{ route('prestasi.detail', $related->id) }}">{{ Str::limit($related->nama_prestasi, 40) }}</a></h4>
                                        <a href="{{ route('prestasi.detail', $related->id) }}">Baca selengkapnya...</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Prestasi Lainnya</h3>
                        </div>
                        <div class="single-widget-container">
                            @foreach($recentPrestasi as $recent)
                            <div class="recent-post-item">
                                <div class="recent-post-image">
                                    <a href="{{ route('prestasi.detail', $recent->id) }}">
                                        <img src="{{ asset('storage/' . $recent->foto) }}" alt="{{ $recent->nama_prestasi }}"
                                             onerror="this.onerror=null;this.src='https://placehold.co/80x80/EFEFEF/AAAAAA&text=...';">
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h4><a href="{{ route('prestasi.detail', $recent->id) }}">{{ $recent->nama_prestasi }}</a></h4>
                                    <span><i class="fa fa-calendar"></i> {{ $recent->created_at->format('d M, Y') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Blog Details Area-->
@endsection
