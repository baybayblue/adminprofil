@extends('layouts.app')
@section('title', 'Guru')
@section('interface')
    <div class="breadcrumb-banner-area teachers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Daftar Guru</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Guru</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="teacher-fullwidth-area section-padding">
        <div class="container">
            <div class="row">

                {{-- Kita akan melakukan looping data guru di sini --}}
                @forelse ($semuaGuru as $guru)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="single-teachers-column text-center">
                            <div class="teachers-image-column">
                                {{-- Link bisa diarahkan ke halaman detail guru nanti --}}
                                <a href="#"> 
                                    {{-- Cek apakah guru punya foto, jika tidak, tampilkan placeholder --}}
                                    @if ($guru->foto)
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                                    @else
                                        <img src="https://via.placeholder.com/300x300.png?text=Foto" alt="{{ $guru->nama }}">
                                    @endif
                                    <span class="image-hover">
                                        <span><i class="fa fa-edit"></i>Lihat Profil</span>
                                    </span>
                                </a>
                            </div>
                            <div class="teacher-column-carousel-text">
                                <h4>{{ $guru->nama }}</h4>

                                {{-- Menampilkan Jabatan dan Jurusan (jika ada) --}}
                                <span>
                                    {{ $guru->jabatan }}
                                    @if ($guru->jurusan)
                                        | {{ $guru->jurusan->nama }}
                                    @endif
                                </span>

                                {{-- Sesuai permintaan, bagian media sosial tidak dihapus --}}
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Pesan ini akan muncul jika tidak ada data guru sama sekali --}}
                    <div class="col-12 text-center">
                        <p>Saat ini belum ada data guru yang tersedia.</p>
                    </div>
                @endforelse

            </div>
            {{-- Tombol Load More bisa diimplementasikan dengan pagination nanti --}}
            {{-- <div class="col-md-12">
                <div class="button text-center">
                    <a href="#" class="button-default button-yellow"><i class="fa fa-refresh"></i>Load More</a>
                </div>
            </div> --}}
        </div>
    </div>
    @endsection