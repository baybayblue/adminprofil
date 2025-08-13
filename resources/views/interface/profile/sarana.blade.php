@extends('layouts.app')
@section('title', 'Sarana dan Prasarana')

@push('styles')
<style>
    /* PERBAIKAN: Membuat area gambar memiliki ukuran yang konsisten */
    .single-items .overlay-effect > a {
        display: block;
        height: 260px; /* Atur tinggi yang sama untuk semua area gambar */
        background-color: #f0f0f0; /* Warna latar jika gambar gagal dimuat */
    }

    /* Memastikan gambar mengisi area container tanpa distorsi */
    .single-items .overlay-effect img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endpush

@section('interface')
    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'sarana'.
    -->
    <div class="breadcrumb-banner-area gallery"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Sarana dan Prasarana</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Sarana dan Prasarana</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gallery-area section-padding gallery-full-width">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-menu">
                        <ul>
                            <li class="filter" data-filter="all">Semua</li>
                            {{-- Loop untuk membuat tombol filter secara dinamis --}}
                            @foreach ($filterSaranas as $filter)
                                {{-- Str::slug() mengubah "Ruang Kelas" menjadi "ruang-kelas" agar valid sebagai class CSS --}}
                                <li class="filter" data-filter=".{{ \Illuminate\Support\Str::slug($filter) }}">{{ $filter }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="filter-items">
                <div class="row">

                    {{-- Loop untuk menampilkan semua gambar sarana --}}
                    @forelse ($semuaSarana as $sarana)
                        {{-- Class 'mix' dan class dari nama sarana digunakan oleh javascript filter --}}
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mix single-items {{ \Illuminate\Support\Str::slug($sarana->nama_sarana) }} overlay-hover">
                            <div class="overlay-effect">
                                <a href="#">
                                    <img src="{{ $sarana->gambar ? asset('storage/' . $sarana->gambar) : 'https://placehold.co/400x300/EFEFEF/AAAAAA&text=Sarana' }}" 
                                         alt="{{ $sarana->nama_sarana }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">
                                </a>
                                <div class="gallery-hover-effect">
                                    {{-- Link untuk lightbox juga disesuaikan --}}
                                    <a class="gallery-icon venobox" href="{{ $sarana->gambar ? asset('storage/' . $sarana->gambar) : 'https://placehold.co/800x600/EFEFEF/AAAAAA&text=Sarana' }}"><i class="fa fa-image"></i></a>
                                    <span class="gallery-text">{{ $sarana->nama_sarana }}</span> 
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <div class="alert alert-info">
                                Belum ada data sarana dan prasarana yang ditambahkan.
                            </div>
                        </div>
                    @endforelse

                </div>  
            </div>
        </div>
    </div>
@endsection
