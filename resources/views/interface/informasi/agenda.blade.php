@extends('layouts.app')
@section('title', 'Agenda Kegiatan')

@push('styles')
<style>
    .agenda-item {
        transition: all 0.3s ease;
    }
    .agenda-item:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }
    .agenda-date {
        position: relative;
        margin-bottom: -15px;
        margin-left: 15px;
        z-index: 1;
    }
    .upcoming-agenda-item {
        transition: all 0.2s ease;
    }
    .upcoming-agenda-item:hover {
        background-color: #f8f9fa;
    }
</style>
@endpush

@section('interface')
    <!-- 
        Area Breadcrumb dan Banner Halaman.
        Background gambar sekarang diatur dari tabel 'backgrounds'.
        Mencari gambar dengan key 'konten'.
    -->
    <div class="breadcrumb-banner-area"
         style="background-image: url('{{ ($background && $background->gambar) ? asset('storage/' . $background->gambar) : asset('assets/images/default-banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Agenda Kegiatan Sekolah</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li>Agenda</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->

    <!--Agenda List Area Start-->
    <div class="class-list-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="class-menu">
                        <div class="search-container">
                            <form action="{{ route('agenda.search') }}" method="get">
                                <input type="text" name="search" placeholder="Cari agenda..." value="{{ request('search') }}" />
                                <button type="submit" class="submit"><i class="fa fa-search"></i></button>
                            </form>                                     
                        </div>  
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    @forelse($agendas as $agenda)
                    <div class="agenda-item mb-4 p-4 border rounded">
                        <div class="agenda-date bg-primary text-white p-2 rounded-top" style="max-width: 120px;">
                            <div class="text-center">
                                <div class="fs-3 fw-bold">{{ $agenda->tanggal_mulai->format('d') }}</div>
                                <div class="fs-6">{{ $agenda->tanggal_mulai->format('M Y') }}</div>
                            </div>
                        </div>
                        <div class="agenda-content p-3">
                            <h3 class="mb-2">{{ $agenda->judul_agenda }}</h3>
                            <div class="agenda-meta mb-3">
                                <span class="me-3"><i class="fa fa-clock-o me-1"></i> {{ $agenda->jam_mulai }} - {{ $agenda->jam_selesai }}</span>
                                <span><i class="fa fa-map-marker me-1"></i> {{ $agenda->lokasi }}</span>
                            </div>
                            <p class="mb-3">{{ Str::limit(strip_tags($agenda->isi_agenda), 250) }}</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">Detail Kegiatan <i class="fa fa-angle-right ms-1"></i></a>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-info">
                        Tidak ada agenda kegiatan saat ini.
                    </div>
                    @endforelse
                    
                    @if($agendas->hasPages())
                    <div class="pagination-content mt-4">
                        <div class="pagination-button">
                            {{ $agendas->links() }}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="single-widget-item res-mrg-top-xs">
                        <div class="single-title">
                            <h3>Agenda Mendatang</h3>
                        </div>
                        <div class="single-widget-container">
                            @foreach($upcomingAgendas as $upcoming)
                            <div class="upcoming-agenda-item mb-3 p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge bg-light text-center p-2 me-3 rounded" style="min-width: 50px;">
                                        <div class="fw-bold text-primary">{{ $upcoming->tanggal_mulai->format('d') }}</div>
                                        <div class="small">{{ $upcoming->tanggal_mulai->format('M') }}</div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ Str::limit($upcoming->judul_agenda, 30) }}</h6>
                                        <small class="text-muted">{{ $upcoming->jam_mulai }} - {{ $upcoming->lokasi }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Kalender Agenda</h3>
                        </div>
                        <div class="single-widget-container">
                            <div class="calendar-widget bg-light p-3 rounded text-center">
                                <!-- Ini bisa diisi dengan kalender sederhana atau library seperti FullCalendar -->
                                <div id="mini-calendar"></div>
                                <small class="text-muted">Pilih tanggal untuk melihat agenda</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="single-widget-item">
                        <div class="single-title">
                            <h3>Kategori Agenda</h3>
                        </div>
                        <div class="single-widget-container">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-decoration-none">Acara Sekolah</a>
                                    <span class="badge bg-primary rounded-pill">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-decoration-none">Kegiatan Siswa</a>
                                    <span class="badge bg-primary rounded-pill">8</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-decoration-none">Ujian</a>
                                    <span class="badge bg-primary rounded-pill">5</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="#" class="text-decoration-none">Pelatihan Guru</a>
                                    <span class="badge bg-primary rounded-pill">3</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Agenda List Area-->
@endsection
