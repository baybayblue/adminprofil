@extends('layouts.app')
@section('title', 'Album Ekstrakurikuler')

@push('styles')
<style>
    .single-class-image img {
        height: 250px;
        object-fit: cover;
        width: 100%;
    }
    .single-class {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .single-class-text {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
@endpush

@section('interface')
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Album Ekstrakurikuler</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Album Ekstrakurikuler</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--Class Grid Area Start-->
    <div class="class-grid-area section-padding">
        <div class="container">
            <div class="row">
                @forelse($semuaEkskul as $ekskul)
                <div class="col-lg-4 col-md-6">
                    <div class="single-class">
                        <div class="single-class-image">
                            <a href="{{ route('ekskul.galeri', $ekskul->id) }}">
                                <img src="{{ $ekskul->gambar ? asset('storage/' . $ekskul->gambar) : 'https://placehold.co/400x300/EFEFEF/AAAAAA&text=Ekskul' }}" 
                                     alt="{{ $ekskul->nama_eskul }}"
                                     onerror="this.onerror=null;this.src='https://placehold.co/400x300/EFEFEF/AAAAAA&text=Gambar';">
                            </a>
                        </div>
                        <div class="single-class-text">
                            <div class="class-des">
                                <h4><a href="{{ route('ekskul.galeri', $ekskul->id) }}">{{ $ekskul->nama_eskul }}</a></h4>
                                <p>{{ Str::limit($ekskul->deskripsi, 100) }}</p>
                            </div>
                            <div class="class-schedule">
                                <span><i class="fa fa-user"></i> Pembina: {{ $ekskul->nama_pembina }}</span>
                                {{-- Tombol Lihat Album --}}
                                <span><a href="{{ route('ekskul.galeri', $ekskul->id) }}"><i class="fa fa-angle-right"></i> Lihat Album</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        Belum ada data ekstrakurikuler yang ditambahkan.
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!--End of Class Grid Area-->
@endsection
