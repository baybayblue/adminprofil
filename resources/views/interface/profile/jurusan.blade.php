@extends('layouts.app')
@section('title', 'Jurusan')
@section('interface')
    <div class="breadcrumb-banner-area gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Jurusan</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Jurusan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Activity Area Start-->
    <div class="activity-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h4>Kerjasama Industri</h4>
                        <p>Kami bekerja sama dengan berbagai perusahaan untuk memberikan pengalaman kerja langsung</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity">
                        <div class="single-activity-icon">
                            <i class="fa fa-certificate"></i>
                        </div>
                        <h4>Sertifikasi</h4>
                        <p>Program sertifikasi kompetensi untuk meningkatkan nilai lulusan di dunia kerja</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon">
                            <i class="fa fa-industry"></i>
                        </div>
                        <h4>Teaching Factory</h4>
                        <p>Pembelajaran berbasis produksi untuk pengalaman nyata di dunia industri</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 activity">
                    <div class="single-activity mrg-res-top-md">
                        <div class="single-activity-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <h4>Kewirausahaan</h4>
                        <p>Mengembangkan jiwa wirausaha melalui berbagai program kreatif</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Activity Area-->
    <!--Jurusan Area Start-->
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
            <div class="row">
                @foreach ($jurusans as $jurusan)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single-class">
                            <div class="single-class-image">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama_jurusan }}"
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="single-class-text">
                                <div class="class-des">
                                    <h4><a href="#">{{ $jurusan->nama_jurusan }}</a></h4>
                                    <p>{{ Str::limit($jurusan->deskripsi, 150) }}</p>
                                </div>
                                <div class="class-schedule">
                                    @if ($jurusan->website_url)
                                        <a href="{{ $jurusan->website_url }}" target="_blank"
                                            class="btn btn-sm btn-primary">Website Jurusan</a>
                                    @endif
                                    <span class="arrow"><a href="#"><i class="fa fa-angle-right"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--End of Jurusan Area-->


@endsection
