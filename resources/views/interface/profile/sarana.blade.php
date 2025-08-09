@extends('layouts.app')
@section('title', 'Sarana dan Prasarana')
@section('interface')
    <div class="breadcrumb-banner-area gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Sarana dan Prasarana</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
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
                                {{-- Cek jika ada gambar, jika tidak, tampilkan placeholder --}}
                                @if($sarana->gambar)
                                    <a href="#"><img src="{{ asset('storage/' . $sarana->gambar) }}" alt="{{ $sarana->nama_sarana }}"></a>
                                @else
                                    <a href="#"><img src="https://via.placeholder.com/400x300.png?text=Sarana" alt="{{ $sarana->nama_sarana }}"></a>
                                @endif
                                <div class="gallery-hover-effect">
                                    {{-- Link untuk lightbox juga disesuaikan --}}
                                    <a class="gallery-icon venobox" href="{{ $sarana->gambar ? asset('storage/' . $sarana->gambar) : 'https://via.placeholder.com/800x600.png?text=Sarana' }}"><i class="fa fa-image"></i></a>
                                    <span class="gallery-text">{{ $sarana->nama_sarana }}</span> 
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Belum ada data sarana dan prasarana yang ditambahkan.</p>
                        </div>
                    @endforelse

                </div>  
                {{-- Tombol "Load More" sengaja dihilangkan karena filter Javascript biasanya bekerja paling baik saat semua item sudah ada di halaman. --}}
            </div>
        </div>
    </div>
    @endsection