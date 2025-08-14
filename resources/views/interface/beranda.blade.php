@extends('layouts.app')
@section('title', 'Beranda')

@push('styles')
<style>
    /* PERBAIKAN: Membuat area statistik lebih rapi */
    .fun-factor-area .row {
        display: flex;
        flex-wrap: wrap;
    }
    .fun-factor-area .col-lg-3, .fun-factor-area .col-md-3 {
        display: flex;
        align-items: stretch; /* Memastikan semua kolom sama tinggi */
    }
    .single-fun-factor {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Konten rata tengah vertikal */
    }
    /* Style untuk foto guru agar seragam */
    .teachers-image-column img {
        height: 280px;
        width: 100%;
        object-fit: cover;
    }
    .single-teachers-column {
        height: 100%;
    }
    /* PERBAIKAN: Membuat kartu berita memiliki tinggi yang sama */
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
    <!--Slider Area Start-->
    <div class="slider-area slider-style-1">
        <div class="preview-2">
            <div id="nivoslider" class="slides">
                @foreach($sliders as $slider)
                    <img src="{{ asset('storage/' . $slider->gambar) }}" alt="" title="#slider-caption-{{ $loop->iteration }}" />
                @endforeach
            </div>
            @foreach($sliders as $slider)
            <div id="slider-caption-{{ $loop->iteration }}" class="nivo-html-caption nivo-caption">
                <div class="banner-content slider-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="text-content">
                                    <h1 class="title1">{{ $slider->judul }}</h1>
                                    <p class="sub-title">{{ $slider->deskripsi }}</p>
                                    @if($slider->link_button)
                                    <div class="banner-readmore">
                                        <a title="Read more" href="{{ $slider->link_button }}">Selengkapnya</a>
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
    <!--End of Slider Area-->

    <!--Activity Area Start-->
    <div class="activity-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon"><i class="fa fa-industry"></i></div>
                        <h4>Kurikulum Industri</h4>
                        <p>Kurikulum yang diselaraskan dengan kebutuhan dunia kerja terkini.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon"><i class="fa fa-certificate"></i></div>
                        <h4>Sertifikasi Kompetensi</h4>
                        <p>Lulusan dibekali sertifikasi yang diakui oleh industri.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon"><i class="fa fa-cogs"></i></div>
                        <h4>Fasilitas Lengkap</h4>
                        <p>Peralatan praktik modern dan memadai untuk setiap jurusan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon"><i class="fa fa-users"></i></div>
                        <h4>Tenaga Pendidik Ahli</h4>
                        <p>Guru dan instruktur berpengalaman dari dunia industri.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Activity Area-->

    <!--Class Area Start-->
    <div class="class-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Program Jurusan Kami</h3>
                            <p>Pilih jurusan yang sesuai dengan passion Anda</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="class-carousel carousel-style-one owl-carousel">
                @foreach($jurusans as $jurusan)
                <div class="single-class">
                    <div class="single-class-image">
                        <a href="{{ route('jurusan') }}">
                            <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama_jurusan }}">
                        </a>
                    </div>
                    <div class="single-class-text">
                        <div class="class-des">
                            <h4><a href="{{ route('jurusan') }}">{{ $jurusan->nama_jurusan }}</a></h4>
                            <p>{{ Str::limit($jurusan->deskripsi, 100) }}</p>
                        </div>
                        <div class="class-schedule">
                            <span class="arrow"><a href="{{ route('jurusan') }}"><i class="fa fa-angle-right"></i> Selengkapnya</a></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End of Class Area-->

    <!--Fun Factor Area Start-->
    {{-- <div class="fun-factor-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-fun-factor">
                        <div class="fun-factor-icon"><i class="fa fa-users"></i></div>
                        <h2><span class="counter">{{ $profil->jumlah_guru ?? 0 }}</span></h2>
                        <span>Guru & Staf</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-fun-factor">
                        <div class="fun-factor-icon"><i class="fa fa-bank"></i></div>
                        <h2><span class="counter">{{ $profil->jumlah_ruang_kelas ?? 0 }}</span></h2>
                        <span>Ruang Kelas</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-fun-factor">
                        <div class="fun-factor-icon"><i class="fa fa-user"></i></div>
                        <h2><span class="counter">{{ $profil->jumlah_siswa ?? 0 }}</span></h2>
                        <span>Siswa</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-fun-factor no-margin">
                        <div class="fun-factor-icon"><i class="fa fa-graduation-cap"></i></div>
                        <h2><span class="counter">{{ $jurusans->count() }}</span></h2>
                        <span>Jurusan</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--End of Fun Factor Area-->

    <!--Teachers Area Start-->
    <div class="teachers-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Guru & Staf Kami</h3>
                            <p>Kami bangga memperkenalkan staf profesional kami</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="teachers-column-carousel carousel-style-one owl-carousel">
                @foreach($gurus as $guru)
                <div class="single-teachers-column text-center">
                    <div class="teachers-image-column">
                        <a href="{{ route('guru.detail', $guru->id) }}">
                            <img src="{{ $guru->foto ? asset('storage/' . $guru->foto) : 'https://placehold.co/300x300/EFEFEF/AAAAAA?text=%EF%80%87&font=fontawesome' }}" alt="{{ $guru->nama }}">
                            <span class="image-hover">
                                <span><i class="fa fa-user"></i>Lihat Profil</span>
                            </span>
                        </a>
                    </div>
                    <div class="teacher-column-carousel-text">
                        <h4><a href="{{ route('guru.detail', $guru->id) }}">{{ $guru->nama }}</a></h4>
                        <span>{{ $guru->jabatan }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End of Teachers Area-->

    <!--Gallery Area Start-->
    <div class="gallery-area section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Galeri Kami</h3>
                            <p>Dokumentasi kegiatan di sekolah kami</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-row">
                <div class="filter-items row">
                    @foreach($galeriItems as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-18 mix single-items drawing overlay-hover">
                        <div class="overlay-effect">
                            <a href="#"><img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}"></a>
                            <div class="gallery-hover-effect">
                                <a class="gallery-icon venobox" href="{{ asset('storage/' . $item->file) }}"><i class="fa fa-image"></i></a>
                                <span class="gallery-text">{{ $item->judul }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="view-gallery text-center">
                        <h4>Lihat Lebih Banyak <span>Foto & Video!</span></h4>
                        <a href="{{ route('galeri.tampil') }}" class="button-default">Lihat Galeri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Gallery Area-->

    <!--Blog Area Start-->
    <div class="blog-area section-padding section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Berita Terbaru</h3>
                            <p>Informasi dan acara terbaru dari sekolah kami</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-carousel carousel-style-one owl-carousel">
                @foreach($beritaTerbaru as $berita)
                <div class="single-blog-item overlay-hover">
                    <div class="single-blog-image">
                        <div class="overlay-effect">
                            <a href="{{ route('berita.detail', $berita->slug) }}">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                                <span class="class-date">{{ $berita->tgl_publikasi->format('M d') }} <span>{{ $berita->tgl_publikasi->format('Y') }}</span></span>
                            </a>
                        </div>
                    </div>
                    <div class="single-blog-text">
                        <h4><a href="{{ route('berita.detail', $berita->slug) }}">{{ $berita->judul }}</a></h4>
                        <div class="blog-date">
                            <span><i class="fa fa-calendar"></i>{{ $berita->tgl_publikasi->format('d F, Y') }}</span>
                        </div>
                        <p>{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                        <a href="{{ route('berita.detail', $berita->slug) }}">Baca selengkapnya...</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End of Blog Area-->
@endsection
