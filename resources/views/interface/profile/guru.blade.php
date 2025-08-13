@extends('layouts.app')
@section('title', 'Guru')
@section('interface')
    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'guru'.
    -->
    <div class="breadcrumb-banner-area teachers"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Daftar Guru</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
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
                                    <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : 'https://placehold.co/300x300/EFEFEF/AAAAAA&text=Foto' }}" 
                                         alt="{{ $guru->nama }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/300x300/EFEFEF/AAAAAA&text=Foto';">
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
                                        | {{ $guru->jurusan->nama_jurusan }}
                                    @endif
                                </span>

                                {{-- Bagian media sosial --}}
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
                        <div class="alert alert-info">
                            Saat ini belum ada data guru yang tersedia.
                        </div>
                    </div>
                @endforelse

            </div>
            {{-- Pagination links bisa ditambahkan di sini jika Anda menggunakan paginate() di controller --}}
            {{-- <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $semuaGuru->links() }}
                </div>
            </div> --}}
        </div>
    </div>
@endsection
