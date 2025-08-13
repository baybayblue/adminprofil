<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home One || TechEdu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Google Fonts
  ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <!-- Style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <!-- Modernizr JS
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <style>
        .pengumuman-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eeeeee;
        }

        .pengumuman-tanggal {
            flex-shrink: 0;
            width: 80px;
            height: 80px;
            background-color: #f1f1f1;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            color: #555;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-right: 20px;
        }

        .pengumuman-tanggal .hari {
            font-size: 32px;
            line-height: 1;
            color: #333;
        }

        .pengumuman-tanggal .bulan {
            font-size: 16px;
            text-transform: uppercase;
            line-height: 1;
            margin-top: 5px;
        }

        .pengumuman-konten h3 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!--Header Area Start-->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-8">
                        <div class="header-top-info">
                            <span>Open hours: 8.00-18.00 Mon-Sat</span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-5 col-md-4">
                        <div class="header-login-register">
                            <ul class="login">
                                <li>
                                    <a href="#"><i class="fa fa-key"></i>Login</a>
                                    <div class="login-form">
                                        <h4>Login</h4>
                                        <form action="#" method="post">
                                            <div class="form-box">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="user-name" placeholder="Username">
                                            </div>
                                            <div class="form-box">
                                                <i class="fa fa-lock"></i>
                                                <input type="password" name="user-password" placeholder="Password">
                                            </div>
                                            <div class="button-box">
                                                <button type="submit" class="login-btn">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            <ul class="register">
                                <li>
                                    <a href="#"><i class="fa fa-lock"></i>Sign Up</a>
                                    <div class="register-form">
                                        <h4>Sign Up</h4>
                                        <span>Please sign up using account detail bellow.</span>
                                        <form action="#" method="post">
                                            <div class="form-box">
                                                <i class="fa fa-user"></i>
                                                <input type="text" name="user-name" placeholder="Username">
                                            </div>
                                            <div class="form-box">
                                                <i class="fa fa-lock"></i>
                                                <input type="password" name="user-password" placeholder="Password">
                                            </div>
                                            <div class="form-box">
                                                <i class="fa fa-envelope"></i>
                                                <input type="email" name="user-email" placeholder="Email">
                                            </div>
                                            <div class="button-box">
                                                <input checked data-toggle="toggle" type="checkbox">
                                                <span>Remember me</span>
                                                <button type="submit" class="register-btn">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--Logo Mainmenu Start-->
        <div class="header-logo-menu sticker">
            <div class="container">
                <div class="logo-menu-bg">
                    <div class="row">
                        <div class="col-lg-1 col-md-12">
                            <div class="logo">
                                {{-- Pastikan variabel $profil ada sebelum digunakan --}}
                                @if (isset($profil) && $profil->logo)
                                    <img src="{{ asset('storage/' . $profil->logo) }}"
                                        alt="Logo {{ $profil->nama_sekolah }}">
                                @else
                                    {{-- Fallback jika logo belum di-set di database --}}

                                    <img src="{{ asset('assets/img/logo/logo-default.png') }}" alt="Logo Sekolah">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-11 d-none d-lg-block">
                            <div class="mainmenu-area">
                                <div class="mainmenu">
                                    <nav>
                                        <ul id="nav">
                                            <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                            <li class="current"><a href="{{ route('profil.tentang') }}">Profil <i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('profil.visi-misi') }}">Visi dan Misi</a></li>
                                                    <li><a href="{{ route('organigram') }}">Organigram</a></li>
                                                    <li><a href="{{ route('jurusan') }}">Jurusan</a></li>
                                                    <li><a href="{{ route('guru.tampil') }}">Guru dan Tata Usaha</a>
                                                    </li>
                                                    <li><a href="{{ route('prestasi.tampil') }}">Prestasi</a></li>
                                                    <li><a href="index-5.html">Keunggulan</a></li>
                                                    <li><a href="{{ route('sarana.tampil') }}">Sarana dan Prasarana</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="class-grid.html">Informasi <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('berita.index') }}">Berita</a></li>
                                                    <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                                                    <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                                                    <li><a href="{{ route('informasi.agenda') }}">Agenda Kegiatan</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('galeri.tampil') }}">Galeri <i class="fa fa-angle-down"></i></a>
                                                <ul class="sub-menu">
                                                    <li><a href="{{ route('galeri.foto') }}">Foto</a></li>
                                                    <li><a href="{{ route('galeri.video') }}">Video</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('ekskul.album') }}">Ekstrakurikuler</a>
                                            </li>
                                            <li><a href="{{ route('testimoni') }}">Testimoni</a></li>
                                            <li><a href="https://coreproject.smakniscjr.sch.id/" target="_blank"
                                                    class="undecorated-link">
                                                    Teaching Factory
                                                    </a< /li>
                                            <li><a href="{{ route('contact') }}">Kontak</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <ul class="header-search">
                                    <li class="search-menu">
                                        <i id="toggle-search" class="fa fa-search"></i>
                                    </li>
                                </ul>
                                <!--Search Form-->
                                <div class="search">
                                    <div class="search-form">
                                        <form id="search-form" action="#">
                                            <input type="search" placeholder="Search here..." name="search" />
                                            <button type="submit">
                                                <span><i class="fa fa-search"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!--End of Search Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Logo Mainmenu-->
        <!-- Mobile Menu Area start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                {{-- MENU MOBILE (SEKARANG SAMA DENGAN MENU DESKTOP) --}}
                                <ul>
                                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                                    <li><a href="{{ route('profil.tentang') }}">Profil</a>
                                        <ul>
                                            <li><a href="{{ route('profil.visi-misi') }}">Visi dan Misi</a></li>
                                            <li><a href="{{ route('organigram') }}">Organigram</a></li>
                                            <li><a href="{{ route('jurusan') }}">Jurusan</a></li>
                                            <li><a href="{{ route('guru.tampil') }}">Guru & Staf</a></li>
                                            <li><a href="{{ route('prestasi.tampil') }}">Prestasi</a></li>
                                            <li><a href="{{ route('sarana.tampil') }}">Sarana Prasarana</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Informasi</a>
                                        <ul>
                                            <li><a href="{{ route('berita.index') }}">Berita</a></li>
                                            <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                                            <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                                            <li><a href="{{ route('informasi.agenda') }}">Agenda Kegiatan</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('galeri.tampil') }}">Galeri</a></li>
                                    <li><a href="{{ route('ekskul.album') }}">Ekstrakurikuler</a></li>
                                    <li><a href="{{ route('testimoni') }}">Testimoni</a></li>
                                    <li><a href="https://coreproject.smakniscjr.sch.id/" target="_blank">Teaching
                                            Factory</a></li>
                                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area end -->
    </header>
    <!--End of Header Area-->
    <main>
        @yield('interface')
    </main>
    <!--Footer Area Start-->
    <div class="footer-area">
        <div class="container">
            <div class="footer-widget-container section-padding">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Profil Sekolah</h4>
                            <ul class="footer-widget-list">
                                <li><a href="{{ route('profil.tentang') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('profil.visi-misi') }}">Visi & Misi</a></li>
                                <li><a href="{{ route('guru.tampil') }}">Guru & Staf</a></li>
                                <li><a href="{{ route('prestasi.tampil') }}">Prestasi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-widget">
                            <h4>Akademik</h4>
                            <ul class="footer-widget-list">
                                <li><a href="{{ route('jurusan') }}">Jurusan</a></li>
                                <li><a href="{{ route('ekskul.album') }}">Ekstrakurikuler</a></li>
                                <li><a href="{{ route('sarana.tampil') }}">Sarana & Prasarana</a></li>
                                <li><a href="{{ route('galeri.tampil') }}">Galeri</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="single-footer-widget">
                            <h4>Informasi</h4>
                            <ul class="footer-widget-list">
                                <li><a href="{{ route('berita.index') }}">Berita</a></li>
                                <li><a href="{{ route('artikel.index') }}">Artikel</a></li>
                                <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
                                <li><a href="{{ route('informasi.agenda') }}">Agenda</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <span>&copy; {{ date('Y') }} <a
                                        href="#">{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</a>. All rights
                                    reserved</span>
                            </div>
                            <div class="col-lg-6">
                                <div class="social-links">
                                    @if ($profil->facebook_url)
                                        <a href="{{ $profil->facebook_url }}" target="_blank"><i
                                                class="fa fa-facebook"></i></a>
                                    @endif
                                    @if ($profil->instagram_url)
                                        <a href="{{ $profil->instagram_url }}" target="_blank"><i
                                                class="fa fa-instagram"></i></a>
                                    @endif
                                    @if ($profil->youtube_url)
                                        <a href="{{ $profil->youtube_url }}" target="_blank"><i
                                                class="fa fa-youtube-play"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Footer Area-->


    <!-- jquery
  ============================================ -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!-- Popper JS
  ============================================ -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>

    <!-- bootstrap JS
  ============================================ -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- bootstrap Toggle JS
  ============================================ -->
    <script src="{{ asset('assets/js/bootstrap-toggle.min.js') }}"></script>

    <!-- nivo slider js
  ============================================ -->
    <script src="{{ asset('assets/lib/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('assets/lib/nivo-slider/home.js') }}"></script>

    <!-- wow JS
  ============================================ -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <!-- meanmenu JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>

    <!-- Owl carousel JS
  ============================================ -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!-- Countdown JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>

    <!-- scrollUp JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>

    <!-- Waypoints JS
  ============================================ -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

    <!-- Counterup JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    <!-- Slick JS
  ============================================ -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!-- Mix It Up JS
  ============================================ -->
    <script src="{{ asset('assets/js/jquery.mixitup.js') }}"></script>

    <!-- Venubox JS
  ============================================ -->
    <script src="{{ asset('assets/js/venobox.min.js') }}"></script>

    <!-- plugins JS
  ============================================ -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- Google Map js
  ============================================ -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
    <script src="https://www.google.com/jsapi"></script>
    <script src="{{ asset('assets/nivo-slider/jquery.nivo.slider.pack.js') }}"></script>
    <script>
        $(window).on('load', function() {
            $('#nivoslider').nivoSlider({
                effect: 'random',
                slices: 15,
                boxCols: 8,
                boxRows: 4,
                animSpeed: 500,
                pauseTime: 5000,
                directionNav: true,
                controlNav: false,
                pauseOnHover: true,
                manualAdvance: false,
            });
        });
    </script>

    <script>
        function initialize() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(23.763494, 90.432226)
            };

            var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);


            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <!-- main JS
  ============================================ -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
