@extends('layouts.app')
@section('title', 'Teaching Factory')

@section('interface')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area teachers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Teaching Factory</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Teaching Factory</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--TEFA Details Area Start-->
    <div class="teacher-details-area section-padding">
        <div class="container">
            @forelse ($tefas as $tefa)
                {{-- Setiap TEFA akan ditampilkan dalam satu blok 'row' --}}
                <div class="row mb-5 pb-5 border-bottom">
                    <div class="col-lg-4 col-md-12">
                        <div class="teacher-details-image">
                            @if($tefa->logo)
                                <img src="{{ Storage::url($tefa->logo) }}" alt="Logo {{ $tefa->nama_tefa }}">
                            @else
                                <img src="https://placehold.co/370x450/EBF3F5/555?text=Logo+TEFA" alt="Logo TEFA">
                            @endif
                        </div>
                        <div class="teacher-details-info">
                            <h4>{{ $tefa->nama_tefa }}</h4>
                            <span>Unit Produksi & Jasa</span>
                            <div class="teacher-info-text">
                                @if($tefa->kontak_person)
                                    <span><i class="fa fa-user"></i>Kontak: {{ $tefa->kontak_person }}</span>
                                @endif
                                @if($tefa->email)
                                    <span><i class="fa fa-envelope"></i>Email: {{ $tefa->email }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="teacher-about-info">
                            <div class="single-title">
                                <h3>Tentang {{ $tefa->nama_tefa }}</h3>
                            </div>
                            <p>{!! nl2br(e($tefa->deskripsi_lengkap ?? 'Informasi tidak tersedia.')) !!}</p>
                            
                            {{-- Tombol Link Eksternal yang menjadi fokus utama --}}
                            @if($tefa->link_web)
                                <a href="{{ $tefa->link_web }}" class="button-default" target="_blank">
                                    <i class="fa fa-external-link"></i> Kunjungi Website Resmi
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- Akhir dari blok untuk satu TEFA --}}
            @empty
                <div class="col-12 text-center">
                    <h3>Mohon Maaf</h3>
                    <p>Belum ada unit Teaching Factory yang tersedia untuk ditampilkan saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
    <!--End of TEFA Details Area-->
@endsection
