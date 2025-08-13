@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}
@section('title', 'Tambah Slider Baru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Slider Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="subjudul">Subjudul (Gunakan Enter untuk baris baru)</label>
                    <textarea name="subjudul" id="subjudul" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar (Rekomendasi ukuran: 1920x800 pixel)</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tombol_teks">Teks Tombol (Opsional)</label>
                    <input type="text" name="tombol_teks" id="tombol_teks" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tombol_url">URL Tombol (Opsional)</label>
                    <input type="url" name="tombol_url" id="tombol_url" class="form-control" placeholder="https://contoh.com">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Slider</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
