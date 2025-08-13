@extends('layouts.app')
@section('title', 'Beranda')
@push('styles')
    <style>
        .slider-area,
        #nivoslider,
        .slides img {
            width: 100%;
            max-width: 1920px;
            height: 740px;
            object-fit: cover;
            display: block;
        }
    </style>
@endpush

@section('interface')

    @if ($profil)
        <!-- Slider Area Start -->
        @if ($sliders->count())
        <div class="slider-area slider-style-1">
            <div class="preview-2">
                {{-- Bagian gambar slider --}}
                <div id="nivoslider" class="slides">	
                    @foreach ($sliders as $slider)
                        <img src="{{ asset('storage/' . $slider->gambar) }}" 
                             alt="{{ $slider->judul }}" 
                             title="#slider-caption-{{ $slider->id }}"/>
                    @endforeach
                </div> 
        
                {{-- Bagian caption slider --}}
                @foreach ($sliders as $slider)
                    <div id="slider-caption-{{ $slider->id }}" class="nivo-html-caption nivo-caption">
                        <div class="banner-content slider-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7">
                                        <div class="text-content">
                                            <h1 class="title1">{{ $slider->judul }}</h1>
                                            <p class="sub-title">{!! nl2br(e($slider->subjudul)) !!}</p>
        
                                            @if ($slider->tombol_teks && $slider->tombol_url)
                                                <div class="banner-readmore">
                                                    <a href="{{ $slider->tombol_url }}">
                                                        {{ $slider->tombol_teks }}
                                                    </a>	
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	  
                @endforeach
            </div>
        </div>
        @endif
        <!-- Slider Area End -->

        <div class="activity-area">
            <div class="container">
                <div class="row">
                    {{-- Bagian ini bisa dibuat dinamis dari Model "Keunggulan" jika diperlukan --}}
                    <div class="col-lg-3 col-md-6 col-sm-6 activity">
                        <div class="single-activity">
                            <div class="single-activity-icon"><i class="fa fa-industry"></i></div>
                            <h4>Praktik Industri</h4>
                            <p>Siswa mendapatkan pengalaman kerja nyata melalui program magang di perusahaan-perusahaan
                                terkemuka.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 activity">
                        <div class="single-activity">
                            <div class="single-activity-icon"><i class="fa fa-cogs"></i></div>
                            <h4>Kompetensi Keahlian</h4>
                            <p>Kurikulum berbasis industri yang dirancang untuk mencetak lulusan siap kerja sesuai dengan
                                jurusannya.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 activity">
                        <div class="single-activity mrg-res-top-md">
                            <div class="single-activity-icon"><i class="fa fa-users"></i></div>
                            <h4>Kegiatan Kesiswaan</h4>
                            <p>Mengembangkan soft skill dan karakter siswa melalui berbagai organisasi dan ekstrakurikuler
                                yang aktif.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 activity">
                        <div class="single-activity mrg-res-top-md">
                            <div class="single-activity-icon"><i class="fa fa-certificate"></i></div>
                            <h4>Sertifikasi Profesi</h4>
                            <p>Peluang mendapatkan sertifikasi kompetensi dari lembaga profesional yang diakui secara
                                nasional.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="class-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>Kompetensi Keahlian</h3>
                                <p>Temukan program keahlian yang sesuai dengan minat dan bakatmu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="class-carousel carousel-style-one owl-carousel">
                    {{-- Looping untuk menampilkan data jurusan --}}
                    @forelse ($jurusan_list as $jurusan)
                        <div class="single-class">
                            <div class="single-class-image">
                                <a href="#"> {{-- Link ke detail jurusan --}}
                                    <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                                        alt="{{ $jurusan->nama_jurusan }}">
                                </a>
                            </div>
                            <div class="single-class-text">
                                <div class="class-des">
                                    <h4><a href="#">{{ $jurusan->nama_jurusan }}</a></h4>
                                    <p>{{ Str::limit($jurusan->deskripsi, 120) }}</p>
                                </div>
                                <div class="class-schedule">
                                    <span><i class="fa fa-users"></i> KUOTA: {{ $jurusan->kuota }}</span>
                                    <span class="arrow"><a href="#"><i class="fa fa-angle-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Tampilan jika data jurusan belum ada --}}
                        <div class="col-md-12 text-center">
                            <p>Data Kompetensi Keahlian akan segera tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="fun-factor-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-fun-factor">
                            <div class="fun-factor-icon"><i class="fa fa-users"></i></div>
                            {{-- Data dinamis dari database --}}
                            <h2><span class="counter">{{ $profil->jumlah_guru }}</span></h2>
                            <span>Tenaga Pendidik</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-fun-factor">
                            <div class="fun-factor-icon"><i class="fa fa-bank"></i></div>
                            {{-- Data dinamis dari database --}}
                            <h2><span class="counter">{{ $profil->jumlah_ruang_kelas }}</span></h2>
                            <span>Ruang Kelas</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-fun-factor">
                            <div class="fun-factor-icon"><i class="fa fa-user"></i></div>
                            {{-- Data dinamis dari database --}}
                            <h2><span class="counter">{{ $profil->jumlah_siswa }}</span></h2>
                            <span>Siswa Aktif</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="single-fun-factor no-margin">
                            <div class="fun-factor-icon"><i class="fa fa-trophy"></i></div>
                            {{-- Data ini bisa dibuat dinamis atau statis --}}
                            <h2><span class="counter">50</span>+</h2>
                            <span>Prestasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-area section-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>Galeri Kegiatan</h3>
                                <p>Momen-momen berharga di sekolah kami</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-row">
                    <div class="filter-items row">
                        {{-- Looping untuk menampilkan foto galeri --}}
                        @forelse ($galeri_terbaru as $foto)
                            <div
                                class="col-lg-3 col-md-6 col-sm-6 col-12 mb-18 mix single-items {{ $foto->kategori }} overlay-hover">
                                <div class="overlay-effect">
                                    <a href="#"><img src="{{ asset('storage/' . $foto->gambar) }}"
                                            alt="{{ $foto->judul }}"></a>
                                    <div class="gallery-hover-effect">
                                        <a class="gallery-icon venobox" href="{{ asset('storage/' . $foto->gambar) }}"><i
                                                class="fa fa-image"></i></a>
                                        <span class="gallery-text">{{ $foto->judul }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <p>Foto kegiatan akan segera tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-area section-padding section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>Berita & Informasi</h3>
                                <p>Ikuti perkembangan terbaru dari sekolah kami</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-carousel carousel-style-one owl-carousel">
                    {{-- Looping untuk menampilkan berita --}}
                    @forelse ($berita_terbaru as $berita)
                        <div class="single-blog-item overlay-hover">
                            <div class="single-blog-image">
                                <div class="overlay-effect">
                                    <a href="#"> {{-- Link ke detail berita --}}
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                                        <span class="class-date">{{ $berita->created_at->format('d M') }}
                                            <span>{{ $berita->created_at->format('Y') }}</span></span>
                                    </a>
                                </div>
                            </div>
                            <div class="single-blog-text">
                                <h4><a href="#">{{ $berita->judul }}</a></h4>
                                <div class="blog-date">
                                    <span><i class="fa fa-user"></i> oleh {{ $berita->penulis }}</span>
                                </div>
                                <p>{{ Str::limit(strip_tags($berita->konten), 150) }}</p>
                                <a href="#">Baca selengkapnya.</a>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 text-center">
                            <p>Berita terbaru akan segera tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="google-map-area">
            <div id="contacts" class="map-area">
                {{-- Menampilkan Peta dari database --}}
                {!! $profil->maps !!}
            </div>
        </div>
    @else
        <div class="container text-center" style="padding: 150px 0;">
            <h2>Selamat Datang</h2>
            <p>Website sedang dalam pengembangan. Silakan hubungi administrator.</p>
        </div>
    @endif

@endsection

@push('scripts')
    <script>
        // Memastikan peta dari embed code menjadi responsif
        document.addEventListener("DOMContentLoaded", function() {
            var mapFrame = document.querySelector(".map-area iframe");
            if (mapFrame) {
                mapFrame.style.width = '100%';
                mapFrame.style.height = '451px';
                mapFrame.style.border = '0';
            }
        });
    </script>
@endpush
