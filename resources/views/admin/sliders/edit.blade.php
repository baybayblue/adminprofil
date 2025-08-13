@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}
@section('title', 'Edit Slider')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Slider</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ $slider->judul }}" required>
                </div>
                <div class="form-group">
                    <label for="subjudul">Subjudul (Gunakan Enter untuk baris baru)</label>
                    <textarea name="subjudul" id="subjudul" class="form-control" rows="3" required>{{ $slider->subjudul }}</textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    <small class="form-text text-muted">Gambar saat ini:</small>
                    <img src="{{ asset('storage/' . $slider->gambar) }}" alt="{{ $slider->judul }}" width="200" class="mt-2">
                </div>
                <div class="form-group">
                    <label for="tombol_teks">Teks Tombol (Opsional)</label>
                    <input type="text" name="tombol_teks" id="tombol_teks" class="form-control" value="{{ $slider->tombol_teks }}">
                </div>
                <div class="form-group">
                    <label for="tombol_url">URL Tombol (Opsional)</label>
                    <input type="url" name="tombol_url" id="tombol_url" class="form-control" value="{{ $slider->tombol_url }}" placeholder="https://contoh.com">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Slider</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
