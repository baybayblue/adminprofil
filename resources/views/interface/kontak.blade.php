@extends('layouts.app')
@section('title', 'Kontak Kami')
@section('interface')

    <style>
        /* Card style selaras tema */
        .contact-area-container,
        .contact-form {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        /* Ikon bulat dengan warna teal */
        .contact-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #e0f7f7;
            color: #00b5b5;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 18px;
        }

        /* Tombol utama kuning (sesuai aksen web) */
        .button-yellow {
            background: #f6c23e;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            color: #fff;
            font-weight: 600;
            transition: background 0.3s;
        }

        .button-yellow:hover {
            background: #dda20a;
        }

        /* Tombol outline sesuai tema */
        .btn-outline-primary {
            border-color: #00b5b5;
            color: #00b5b5;
        }

        .btn-outline-primary:hover {
            background: #00b5b5;
            color: white;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 8px;
            font-size: 16px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-btn.facebook {
            background: #3b5998;
        }

        .social-btn.facebook:hover {
            background: #2d4373;
        }

        .social-btn.instagram {
            background: linear-gradient(45deg, #feda75, #d62976, #962fbf);
        }

        .social-btn.instagram:hover {
            filter: brightness(0.9);
        }

        .social-btn.youtube {
            background: #ff0000;
        }

        .social-btn.youtube:hover {
            background: #cc0000;
        }
    </style>


    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'kontak'.
    -->
    <div class="breadcrumb-banner-area text-center"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="breadcrumb-text">
                <h1>Hubungi Kami</h1>
                <div class="breadcrumb-bar">
                    <ul class="breadcrumb">
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li>Kontak</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Breadcrumb Area -->

    <!-- Contact Area Start -->
    <div class="contact-area section-padding py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Google Maps -->
                @if ($profil->maps)
                    <div class="col-12">
                        <iframe width="100%" height="350" style="border-radius: 12px; border: none;"
                            src="https://maps.google.com/maps?q={{ urlencode($profil->alamat) }}&output=embed">
                        </iframe>
                    </div>
                @endif

                <!-- Info Kontak -->
                <div class="col-lg-5">
                    <div class="contact-area-container">
                        <div class="single-title mb-3">
                            <h3>Informasi Kontak</h3>
                        </div>
                        <p>Silakan hubungi kami melalui informasi di bawah ini atau isi formulir kontak untuk pertanyaan
                            lebih lanjut tentang sekolah kami.</p>

                        <div class="contact-address-container mt-4">

                            <!-- Alamat -->
                            <div class="contact-address-info">
                                <div class="contact-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Alamat Sekolah</h4>
                                    <span>{{ $profil->alamat ?? 'Alamat belum diisi' }}</span>
                                    @if ($profil->maps)
                                        <div class="mt-2">
                                            <a href="https://maps.google.com/?q={{ urlencode($profil->alamat) }}"
                                                target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-map-o"></i> Lihat di Google Maps
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Telepon -->
                            <div class="contact-address-info">
                                <div class="contact-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Telepon</h4>
                                    <span>{{ $profil->no_telp ?? 'Nomor telepon belum diisi' }}</span>
                                    @if ($profil->no_telp)
                                        <div class="mt-2">
                                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $profil->no_telp) }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="fa fa-phone"></i> Hubungi Kami
                                            </a>
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->no_telp) }}"
                                                target="_blank" class="btn btn-sm btn-outline-success ms-2">
                                                <i class="fa fa-whatsapp"></i> WhatsApp
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="contact-address-info">
                                <div class="contact-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact-text">
                                    <h4>Email</h4>
                                    <span>{{ $profil->email ?? 'Email belum diisi' }}</span>
                                    @if ($profil->email)
                                        <div class="mt-2">
                                            <a href="mailto:{{ $profil->email }}" class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-envelope-o"></i> Kirim Email
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Sosial Media -->
                            @if ($profil->facebook_url || $profil->instagram_url || $profil->youtube_url)
                                <div class="contact-address-info d-flex align-items-start mb-4">
                                    <div class="contact-icon">
                                        <i class="fa fa-share-alt"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h4 class="mb-2">Sosial Media</h4>
                                        <div class="social-links mt-2 d-flex flex-wrap">
                                            @if ($profil->facebook_url)
                                                <a href="{{ $profil->facebook_url }}" target="_blank"
                                                    class="social-btn facebook">
                                                    <i class="fa fa-facebook-f"></i>
                                                </a>
                                            @endif
                                            @if ($profil->instagram_url)
                                                <a href="{{ $profil->instagram_url }}" target="_blank"
                                                    class="social-btn instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            @endif
                                            @if ($profil->youtube_url)
                                                <a href="{{ $profil->youtube_url }}" target="_blank"
                                                    class="social-btn youtube">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>

                <!-- Form Kontak -->
                <div class="col-lg-7">
                    <div class="contact-form">
                        <div class="single-title mb-3">
                            <h3>Kirim Pesan</h3>
                        </div>
                        <div class="contact-form-container">
                            <form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nama Lengkap *" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Alamat Email *" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="subject" class="form-control" placeholder="Subjek Pesan *"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <textarea name="message" class="form-control yourmessage" placeholder="Isi Pesan Anda *" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="button-default button-yellow submit">
                                    <i class="fa fa-send"></i> Kirim Pesan
                                </button>
                            </form>
                            <p class="form-message mt-3"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Contact Area -->

@endsection
