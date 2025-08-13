@extends('layouts.admin')

@section('title', 'Manajemen Slider')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Slider</h1>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Slider Baru
        </a>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="row">
        @forelse ($sliders as $slider)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{ asset('storage/' . $slider->gambar) }}" 
                         class="card-img-top" 
                         alt="{{ $slider->judul }}" 
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary font-weight-bold">{{ $slider->judul }}</h5>
                        <p class="card-text small">{{ Str::limit($slider->subjudul, 100) }}</p>
                        
                        <div class="mt-auto">
                            <p>
                                <strong>Status: </strong>
                                <span class="badge {{ $slider->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $slider->status ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </p>
    
                            <div class="d-flex">
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus slider ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada slider. <a href="{{ route('admin.sliders.create') }}">Tambah slider baru</a>.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
