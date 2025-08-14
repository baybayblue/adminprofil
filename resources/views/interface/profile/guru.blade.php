@extends('layouts.app')
@section('title', 'Guru & Staf')

@push('styles')
<style>
    .teachers-image-column img {
        height: 280px;
        width: 100%;
        object-fit: cover;
    }
    .single-teachers-column {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .teacher-column-carousel-text {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .teacher-column-carousel-text .info {
        flex-grow: 1;
    }
    /* Memastikan link pada nama tidak mengubah warna default */
    .teacher-column-carousel-text h4 a {
        color: inherit;
        text-decoration: none;
    }
    .teacher-column-carousel-text h4 a:hover {
        color: #00b5b5; /* Warna hover, sesuaikan dengan tema Anda */
    }
</style>
@endpush

@section('interface')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area teachers"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Guru & Staf</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Guru & Staf</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--Teacher Fullwidth Area Start-->
    <div class="teacher-fullwidth-area section-padding">
        <div class="container">
            <div class="row">

                @forelse ($semuaGuru as $guru)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                        <div class="single-teachers-column text-center">
                            <div class="teachers-image-column">
                                {{-- Tautan sekarang mengarah ke halaman detail guru --}}
                                <a href="#"> 
                                    <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : 'https://placehold.co/300x300/EFEFEF/AAAAAA?text=%EF%80%87&font=fontawesome' }}" 
                                         alt="{{ $guru->nama }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/300x300/EFEFEF/AAAAAA?text=%EF%80%87&font=fontawesome';">
                                    {{-- <span class="image-hover">
                                        <span><i class="fa fa-user"></i>Lihat Profil</span>
                                    </span> --}}
                                </a>
                            </div>
                            <div class="teacher-column-carousel-text">
                                <div class="info">
                                    {{-- Nama guru juga sekarang menjadi tautan --}}
                                    <h4><a href="{{ route('guru.detail', $guru->id) }}">{{ $guru->nama }}</a></h4>
                                    <span>{{ $guru->jabatan }} @if($guru->jurusan) | {{ $guru->jurusan->nama_jurusan }} @endif</span>
                                </div>
                                <div class="social-links">
                                    @if($guru->facebook_url) <a href="{{ $guru->facebook_url }}" target="_blank"><i class="fa fa-facebook"></i></a> @endif
                                    @if($guru->instagram_url) <a href="{{ $guru->instagram_url }}" target="_blank"><i class="fa fa-instagram"></i></a> @endif
                                    @if($guru->linkedin_url) <a href="{{ $guru->linkedin_url }}" target="_blank"><i class="fa fa-linkedin"></i></a> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            Saat ini belum ada data guru yang tersedia.
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
    <!--End of Teacher Fullwidth Area-->
@endsection
