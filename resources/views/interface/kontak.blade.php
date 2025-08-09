@extends('layouts.app')
@section('title', 'Kontak Kami')
@section('interface')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Hubungi Kami</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Kontak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Breadcrumb Area -->

    <!-- Contact Area Start -->
    <div class="contact-area section-padding">
        <div class="container">
            <div class="row">
                @if ($profil->maps)
                    <div class="mt-3">
                        <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"
                            src="https://maps.google.com/maps?q={{ urlencode($profil->alamat) }}&output=embed">
                        </iframe>
                    </div>
                @endif
                <div class="col-lg-5">
                    <div class="contact-area-container">
                        <div class="single-title">
                            <h3>Informasi Kontak</h3>
                        </div>
                        <p>Silakan hubungi kami melalui informasi di bawah ini atau isi formulir kontak untuk pertanyaan
                            lebih lanjut tentang sekolah kami.</p>

                        <div class="contact-address-container">
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
                            @if ($profil->facebook_url || $profil->instagram_url || $profil->youtube_url)
                                <div class="contact-address-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-share-alt"></i>
                                    </div>
                                    <div class="contact-text">
                                        <h4>Sosial Media</h4>
                                        <div class="social-links mt-2">
                                            @if ($profil->facebook_url)
                                                <a href="{{ $profil->facebook_url }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary me-2">
                                                    <i class="fa fa-facebook"></i> Facebook
                                                </a>
                                            @endif
                                            @if ($profil->instagram_url)
                                                <a href="{{ $profil->instagram_url }}" target="_blank"
                                                    class="btn btn-sm btn-outline-danger me-2">
                                                    <i class="fa fa-instagram"></i> Instagram
                                                </a>
                                            @endif
                                            @if ($profil->youtube_url)
                                                <a href="{{ $profil->youtube_url }}" target="_blank"
                                                    class="btn btn-sm btn-outline-danger">
                                                    <i class="fa fa-youtube"></i> YouTube
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form">
                        <div class="single-title">
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
