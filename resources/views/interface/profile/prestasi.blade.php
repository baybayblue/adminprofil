@extends('layouts.app')
@section('title', 'Prestasi')
@section('interface')
    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'prestasi'.
    -->
    <div class="breadcrumb-banner-area blog"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Prestasi Sekolah</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
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
                                        <img src="{{ $prestasi->foto ? asset('storage/' . $prestasi->foto) : 'https://placehold.co/400x300/EFEFEF/AAAAAA&text=Prestasi' }}" 
                                             alt="{{ $prestasi->nama_prestasi }}"
                                             onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">

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
                        <div class="alert alert-info">
                            Saat ini belum ada data prestasi yang ditambahkan.
                        </div>
                    </div>
                @endforelse

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination-content">
                        {{-- Link pagination dari controller --}}
                        {{ $semuaPrestasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
