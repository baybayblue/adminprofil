@extends('layouts.app')
@section('title', 'Prestasi')
@section('interface')
    <div class="breadcrumb-banner-area blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Prestasi Sekolah</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Prestasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog-fullwidth-area section-padding blog-two">
        <div class="container">
            <div class="row">

                {{-- Loop untuk setiap item prestasi dari controller --}}
                @forelse ($semuaPrestasi as $prestasi)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-item overlay-hover">
                            <div class="single-blog-image">
                                <div class="overlay-effect">
                                    {{-- Link bisa diarahkan ke halaman detail nanti --}}
                                    <a href="#">
                                        {{-- Cek jika ada foto, jika tidak pakai placeholder --}}
                                        @if ($prestasi->foto)
                                            <img src="{{ asset('storage/' . $prestasi->foto) }}" alt="{{ $prestasi->nama_prestasi }}">
                                        @else
                                            <img src="https://via.placeholder.com/400x300.png?text=Prestasi" alt="{{ $prestasi->nama_prestasi }}">
                                        @endif

                                        {{-- Menampilkan tanggal dari data 'created_at' --}}
                                        <span class="class-date">{{ $prestasi->created_at->format('M d') }} <span>{{ $prestasi->created_at->format('Y') }}</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-blog-text">
                                <h4><a href="#">{{ $prestasi->nama_prestasi }}</a></h4>
                                <div class="blog-date">
                                    <span><i class="fa fa-calendar"></i>{{ $prestasi->created_at->format('d M, Y') }}</span>
                                </div>

                                {{-- Batasi deskripsi agar tidak terlalu panjang di halaman utama --}}
                                <p>{{ \Illuminate\Support\Str::limit($prestasi->deskripsi, 120, '...') }}</p>

                                <a href="#">Baca selengkapnya.</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Saat ini belum ada data prestasi yang ditambahkan.</p>
                    </div>
                @endforelse

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-content">
                        {{-- Di sinilah keajaiban pagination Laravel terjadi! --}}
                        {{-- Baris ini akan otomatis membuat link ke halaman 1, 2, 3, dst. --}}
                        {{ $semuaPrestasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection