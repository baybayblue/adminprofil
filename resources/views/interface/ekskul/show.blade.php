@extends('layouts.app')
@section('title', $post->nama_kegiatan)
@section('interface')

<!-- Breadcrumb Banner Area Start -->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">{{ $post->nama_kegiatan }}</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ route('ekskul') }}">Ekstrakurikuler</a></li>
                            <li>{{ $post->nama_kegiatan }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Breadcrumb Banner Area -->

<!-- Ekstrakurikuler Details Area Start -->
<div class="class-details-area section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="class-details-container">
                    <h1>{{ $post->nama_kegiatan }}</h1>
                    @if($post->foto_kegiatan)
                    <div class="class-details-carousel carousel-style-one owl-carousel">
                        <img src="{{ asset('storage/'.$post->foto_kegiatan) }}" alt="{{ $post->nama_kegiatan }}">
                        <!-- Jika ada gambar tambahan bisa dimasukkan di sini -->
                    </div>
                    @endif
                </div>
                <div class="class-details-tab">
                    <div class="class-details-tab-menu">
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation"><a class="active" data-bs-toggle="tab" role="tab" aria-controls="overview" href="#overview"><i class="fa fa-info-circle"></i> Deskripsi</a></li>
                            <li role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="schedule" href="#schedule"><i class="fa fa-calendar"></i> Jadwal Kegiatan</a></li>
                            <li role="presentation"><a data-bs-toggle="tab" role="tab" aria-controls="gallery" href="#gallery"><i class="fa fa-image"></i> Galeri</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active" role="tabpanel">
                            <h3>TENTANG KEGIATAN</h3>
                            {!! nl2br(e($post->deskripsi)) !!}
                            
                            <h3 class="mt-4">MANFAAT KEGIATAN</h3>
                            <div class="tab-info">
                                <span class="icon">Mengembangkan bakat dan minat siswa</span>
                                <span class="icon">Melatih kerja sama tim dan kepemimpinan</span>
                                <span class="icon">Menambah pengalaman dan keterampilan baru</span>
                                <span class="icon">Membangun jaringan pertemanan yang positif</span>
                                <span class="icon">Meningkatkan kreativitas dan inovasi</span>
                            </div>
                        </div>
                        <div id="schedule" class="tab-pane" role="tabpanel">
                            <h3>JADWAL KEGIATAN</h3>
                            <p>Berikut adalah jadwal rutin kegiatan ekstrakurikuler ini:</p>			
                            <div class="table-content table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Waktu</th>
                                            <th>Tempat</th>
                                            <th>Pembina</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Senin & Rabu</td>
                                            <td>15.00 - 17.00 WIB</td>
                                            <td>Lapangan Sekolah</td>
                                            <td>Bapak/Ibu Guru Pembina</td>
                                        </tr>
                                        <tr>
                                            <td>Sabtu</td>
                                            <td>08.00 - 11.00 WIB</td>
                                            <td>Ruang Ekstrakurikuler</td>
                                            <td>Bapak/Ibu Guru Pembina</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="alert alert-info mt-3">
                                <i class="fa fa-info-circle"></i> Jadwal mungkin berubah sesuai dengan kegiatan sekolah. Informasi terbaru akan disampaikan oleh pembina.
                            </div>
                        </div>
                        <div id="gallery" class="tab-pane" role="tabpanel">
                            <h3>GALERI KEGIATAN</h3>
                            <div class="row">
                                @if($post->foto_kegiatan)
                                <div class="col-md-4 mb-3">
                                    <a href="{{ asset('storage/'.$post->foto_kegiatan) }}" class="venobox" data-gall="gallery">
                                        <img src="{{ asset('storage/'.$post->foto_kegiatan) }}" class="img-fluid rounded" alt="Galeri Kegiatan">
                                    </a>
                                </div>
                                @endif
                                <!-- Tambahan gambar galeri bisa dimasukkan di sini -->
                                <div class="col-md-4 mb-3">
                                    <a href="{{ asset('img/ekskul/gallery1.jpg') }}" class="venobox" data-gall="gallery">
                                        <img src="{{ asset('img/ekskul/gallery1-thumb.jpg') }}" class="img-fluid rounded" alt="Galeri Kegiatan">
                                    </a>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <a href="{{ asset('img/ekskul/gallery2.jpg') }}" class="venobox" data-gall="gallery">
                                        <img src="{{ asset('img/ekskul/gallery2-thumb.jpg') }}" class="img-fluid rounded" alt="Galeri Kegiatan">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="single-widget-item">
                    <div class="single-title">
                        <h3>Informasi Ekstrakurikuler</h3>
                    </div>
                    <div class="single-widget-container">
                        <ul class="class-infos">
                            <li><i class="fa fa-tag"></i> Jenis: {{ $post->ekstrakurikuler->nama }}</li>
                            <li><i class="fa fa-calendar"></i> Mulai: {{ $post->created_at->format('d M Y') }}</li>
                            <li><i class="fa fa-users"></i> Peserta: Kelas {{ $post->ekstrakurikuler->tingkat_kelas ?? '7-12' }}</li>
                            <li><i class="fa fa-clock-o"></i> Jadwal: Senin & Rabu, 15.00-17.00</li>
                            <li><i class="fa fa-map-marker"></i> Lokasi: {{ $post->ekstrakurikuler->lokasi ?? 'Ruang Ekstrakurikuler' }}</li>
                            <li><i class="fa fa-user"></i> Pembina: {{ $post->ekstrakurikuler->pembina ?? 'Guru Pembina' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="single-widget-item">
                    <div class="single-title">
                        <h3>Pembina</h3>
                    </div>
                    <div class="single-widget-container">
                        <div class="teacher-info-widget">
                            <div class="widget-image">
                                <img src="{{ asset('img/teacher/pembina.jpg') }}" alt="Pembina Ekstrakurikuler">
                            </div>
                            <div class="widget-infos">
                                <h4>{{ $post->ekstrakurikuler->pembina ?? 'Guru Pembina' }}</h4>
                                <p>Pembina {{ $post->ekstrakurikuler->nama }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-widget-item">
                    <div class="single-title">
                        <h3>Daftar Sekarang</h3>
                    </div>
                    <div class="single-widget-container">
                        <p>Bergabunglah dengan ekstrakurikuler ini untuk mengembangkan bakat dan minat Anda.</p>
                        <a href="{{ route('ekskul.daftar') }}?ekskul={{ $post->ekstrakurikuler->id }}" class="btn btn-success btn-block">
                            Daftar {{ $post->ekstrakurikuler->nama }}
                        </a>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
<!-- End of Ekstrakurikuler Details Area -->

<!-- Related Activities Start -->
<div class="class-area section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-title">
                    <h3>Kegiatan Lainnya</h3>
                </div>
            </div>
        </div>
        <div class="class-carousel carousel-style-one owl-carousel">
            @foreach($relatedPosts as $related)
            <div class="single-class">
                <div class="single-class-image">
                    <a href="{{ route('ekskul.detail', $related->id) }}">
                        @if($related->foto_kegiatan)
                            <img src="{{ asset('storage/'.$related->foto_kegiatan) }}" alt="{{ $related->nama_kegiatan }}">
                        @else
                            <img src="{{ asset('img/ekskul/default-class.jpg') }}" alt="Kegiatan Ekstrakurikuler">
                        @endif
                        <span class="class-date">{{ $related->created_at->format('M d') }} <span>{{ $related->created_at->format('Y') }}</span></span>
                    </a>
                </div>
                <div class="single-class-text">
                    <div class="class-des">
                        <h4><a href="{{ route('ekskul.detail', $related->id) }}">{{ $related->nama_kegiatan }}</a></h4>
                        <p>{{ Str::limit($related->deskripsi, 100) }}</p>
                    </div>
                    <div class="class-schedule">
                        <span>{{ $related->ekstrakurikuler->nama }}</span>
                        <span class="arrow"><a href="{{ route('ekskul.detail', $related->id) }}"><i class="fa fa-angle-right"></i></a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>    
    </div>
</div>
<!-- End of Related Activities -->

@endsection

@push('styles')
<style>
    .class-infos li {
        padding: 8px 0;
        border-bottom: 1px dashed #eee;
    }
    .class-infos i {
        color: #f39c12;
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    .tab-info {
        margin: 15px 0;
    }
    .tab-info .icon {
        display: block;
        padding: 5px 0 5px 25px;
        position: relative;
    }
    .tab-info .icon:before {
        content: "\f00c";
        font-family: FontAwesome;
        color: #f39c12;
        position: absolute;
        left: 0;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        // Inisialisasi owl carousel untuk gambar utama
        $('.class-details-carousel').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000
        });
        
        // Inisialisasi owl carousel untuk kegiatan terkait
        $('.class-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            responsive: {
                0: { items: 1 },
                768: { items: 2 },
                992: { items: 3 }
            }
        });
        
        // Inisialisasi venobox untuk galeri
        $('.venobox').venobox({
            numeratio: true,
            infinigall: true
        });
    });
</script>
@endpush