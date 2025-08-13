@extends('layouts.app')
@section('title', 'Testimoni')

@push('styles')
<style>
    .testimonial-carousel-text {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
        position: relative;
        margin-bottom: 30px;
    }
    .testimonial-carousel-text:after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50px;
        border-width: 15px 15px 0;
        border-style: solid;
        border-color: #f8f9fa transparent;
    }
    .testimonial-information {
        display: flex;
        align-items: center;
        padding-left: 30px;
    }
    .testimonial-image img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .testimoni-form-container {
        background: #fff;
    }
</style>
@endpush

@section('interface')

<!-- 
    Area Breadcrumb dan Banner Halaman.
    Background gambar sekarang diatur dari tabel 'backgrounds'.
    Mencari gambar dengan key 'testimoni'.
-->
<div class="breadcrumb-banner-area"
     style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Testimoni</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Testimoni</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Breadcrumb Area -->

<!-- Testimonial Area Start -->
<div class="testimonial-carousel-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Apa Kata Mereka</h3>
                        <p>Testimoni dari warga sekolah tentang pengalaman mereka</p>
                    </div>
                </div>
            </div>
        </div>
        
        @if($testimonis->count() > 0)
        <div class="testimonial-carousel carousel-style-one owl-carousel">
            @foreach($testimonis as $testimoni)
            <div class="single-testimonial-carousel">
                <div class="testimonial-carousel-text">
                    <p>"{{ $testimoni->isi_testimoni }}"</p>
                </div>
                <div class="testimonial-information">
                    <div class="testimonial-image">
                        <img 
                            src="{{ $testimoni->foto ? asset('storage/'.$testimoni->foto) : asset('images/icon-user.png') }}" 
                            alt="{{ $testimoni->nama_pemberi }}" 
                            class="img-fluid rounded-circle"
                            onerror="this.onerror=null;this.src='{{ asset('assets/img/user-logo.jpeg') }}';">
                    </div>                    
                    <div class="testimonial-name">
                        <h4>{{ $testimoni->nama_pemberi }}</h4>
                        <span>{{ $testimoni->jabatan_atau_asal }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="alert alert-info text-center">
            Belum ada testimoni yang tersedia.
        </div>
        @endif
    </div>
</div>
<!-- End of Testimonial Area -->


<!-- Testimoni Form Section -->
<div class="testimoni-form-area section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="testimoni-form-container p-5 rounded shadow">
                    <div class="section-title text-center mb-5">
                        <h3>Bagikan Pengalaman Anda</h3>
                        <p>Kirim testimoni Anda tentang sekolah kami</p>
                    </div>
                    
                    <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="nama_pemberi" class="form-control" placeholder="Nama Lengkap *" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="jabatan_atau_asal" class="form-control" placeholder="Jabatan/Asal *" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea name="isi_testimoni" class="form-control" rows="5" placeholder="Isi testimoni Anda *" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="foto" class="form-label">Unggah Foto (Opsional)</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-paper-plane me-2"></i> Kirim Testimoni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Testimoni Form Section -->

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    });
</script>
@endpush
