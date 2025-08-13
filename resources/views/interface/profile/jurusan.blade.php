@extends('layouts.app')
@section('title', 'Jurusan')

@push('styles')
    <style>
        .single-class {
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .single-class:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .single-class-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .single-class-text {
            padding: 15px;
        }

        .owl-nav {
            text-align: center;
            margin-top: 20px;
        }

        .owl-nav button {
            background: #0056b3;
            color: #fff;
            padding: 6px 15px;
            margin: 0 5px;
            border-radius: 4px;
        }

        .owl-nav button:hover {
            background: #003d80;
        }
    </style>
@endpush

@section('interface')
    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'jurusan'.
    -->
    <div class="breadcrumb-banner-area gallery"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Jurusan</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Jurusan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Area -->
    <div class="activity-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon"><i class="fa fa-briefcase"></i></div>
                        <h4>Kerjasama Industri</h4>
                        <p>Kami bekerja sama dengan berbagai perusahaan untuk memberikan pengalaman kerja langsung.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon"><i class="fa fa-certificate"></i></div>
                        <h4>Sertifikasi</h4>
                        <p>Program sertifikasi kompetensi untuk meningkatkan nilai lulusan di dunia kerja.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon"><i class="fa fa-industry"></i></div>
                        <h4>Teaching Factory</h4>
                        <p>Pembelajaran berbasis produksi untuk pengalaman nyata di dunia industri.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon"><i class="fa fa-graduation-cap"></i></div>
                        <h4>Kewirausahaan</h4>
                        <p>Mengembangkan jiwa wirausaha melalui berbagai program kreatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jurusan Carousel -->
    <div class="class-area section-padding" id="jurusan">
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

            <div class="owl-carousel owl-theme" id="jurusan-carousel">
                @foreach ($jurusans as $jurusan)
                    <div class="item">
                        <div class="single-class">
                            <div class="single-class-image">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama_jurusan }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">
                                </a>
                            </div>
                            <div class="single-class-text">
                                <div class="class-des">
                                    <h4><a href="#">{{ $jurusan->nama_jurusan }}</a></h4>
                                    <p>{{ Str::limit($jurusan->deskripsi, 150) }}</p>
                                </div>
                                <div class="class-schedule mt-2">
                                    @if ($jurusan->website_url)
                                        <a href="{{ $jurusan->website_url }}" class="btn btn-sm btn-outline-primary" target="_blank">Website Jurusan</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#jurusan-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive: {
                    0: { items: 1 },
                    576: { items: 1 },
                    768: { items: 2 },
                    992: { items: 3 },
                    1200: { items: 3 }
                }
            });
        });
    </script>
@endpush
