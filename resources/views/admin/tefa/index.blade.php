@extends('layouts.admin')

@section('title', 'Kelola Teaching Factory')

@section('content')
{{-- Form utama yang membungkus semuanya --}}
<form action="{{ route('admin.tefa.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Kelola Unit Teaching Factory</h3>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan Semua Perubahan</button>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <p class="text-muted">Kelola semua unit TEFA Anda di bawah ini. Klik pada nama unit untuk membuka detailnya.</p>
            
            {{-- Accordion untuk setiap unit TEFA yang sudah ada --}}
            <div id="accordion">
                @forelse ($tefas as $tefa)
                    <div class="card mb-2 shadow-sm">
                        <div class="card-header" id="heading-{{ $tefa->id }}">
                            <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-link text-left" data-toggle="collapse" data-target="#collapse-{{ $tefa->id }}" aria-expanded="false" aria-controls="collapse-{{ $tefa->id }}">
                                    {{ $tefa->nama_tefa }}
                                </button>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="delete-{{ $tefa->id }}" name="delete[]" value="{{ $tefa->id }}">
                                    <label class="custom-control-label text-danger" for="delete-{{ $tefa->id }}">Hapus</label>
                                </div>
                            </h5>
                        </div>

                        <div id="collapse-{{ $tefa->id }}" class="collapse" aria-labelledby="heading-{{ $tefa->id }}" data-parent="#accordion">
                            <div class="card-body">
                                {{-- Input-input di dalam accordion untuk setiap TEFA --}}
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama_tefa_{{ $tefa->id }}">Nama Unit TEFA</label>
                                            <input type="text" name="tefa[{{ $tefa->id }}][nama_tefa]" id="nama_tefa_{{ $tefa->id }}" class="form-control" value="{{ old('tefa.'.$tefa->id.'.nama_tefa', $tefa->nama_tefa) }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_singkat_{{ $tefa->id }}">Deskripsi Singkat</label>
                                            <textarea name="tefa[{{ $tefa->id }}][deskripsi_singkat]" id="deskripsi_singkat_{{ $tefa->id }}" class="form-control" rows="2">{{ old('tefa.'.$tefa->id.'.deskripsi_singkat', $tefa->deskripsi_singkat) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_lengkap_{{ $tefa->id }}">Deskripsi Lengkap</label>
                                            <textarea name="tefa[{{ $tefa->id }}][deskripsi_lengkap]" id="deskripsi_lengkap_{{ $tefa->id }}" class="form-control" rows="4">{{ old('tefa.'.$tefa->id.'.deskripsi_lengkap', $tefa->deskripsi_lengkap) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="logo_{{ $tefa->id }}">Ganti Logo</label>
                                            <input type="file" name="tefa[{{ $tefa->id }}][logo]" id="logo_{{ $tefa->id }}" class="form-control-file">
                                            @if($tefa->logo)
                                                <img src="{{ Storage::url($tefa->logo) }}" alt="Logo" class="img-thumbnail mt-2" width="150">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="link_web_{{ $tefa->id }}">Link Website</label>
                                            <input type="url" name="tefa[{{ $tefa->id }}][link_web]" id="link_web_{{ $tefa->id }}" class="form-control" value="{{ old('tefa.'.$tefa->id.'.link_web', $tefa->link_web) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="kontak_person_{{ $tefa->id }}">Kontak Person</label>
                                            <input type="text" name="tefa[{{ $tefa->id }}][kontak_person]" id="kontak_person_{{ $tefa->id }}" class="form-control" value="{{ old('tefa.'.$tefa->id.'.kontak_person', $tefa->kontak_person) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email_{{ $tefa->id }}">Email</label>
                                            <input type="email" name="tefa[{{ $tefa->id }}][email]" id="email_{{ $tefa->id }}" class="form-control" value="{{ old('tefa.'.$tefa->id.'.email', $tefa->email) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">Belum ada data Teaching Factory. Silakan tambahkan di bawah.</p>
                @endforelse
            </div>

            <hr class="my-4">

            {{-- Form untuk menambah unit TEFA baru --}}
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h4 class="card-title mb-0"><i class="fas fa-plus-circle mr-2"></i>Tambah Unit TEFA Baru</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                             <div class="form-group">
                                <label for="new_nama_tefa">Nama Unit TEFA Baru</label>
                                <input type="text" name="new[nama_tefa]" id="new_nama_tefa" class="form-control @error('new.nama_tefa') is-invalid @enderror" placeholder="Isi nama untuk menambah unit baru">
                                @error('new.nama_tefa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="new_deskripsi_singkat">Deskripsi Singkat</label>
                                <textarea name="new[deskripsi_singkat]" id="new_deskripsi_singkat" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="new_logo">Logo Unit Baru</label>
                                <input type="file" name="new[logo]" id="new_logo" class="form-control-file @error('new.logo') is-invalid @enderror">
                                @error('new.logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan Semua Perubahan</button>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    // Script untuk konfirmasi sebelum menghapus
    document.querySelector('form').addEventListener('submit', function(e) {
        let deleteCheckboxes = document.querySelectorAll('input[name="delete[]"]:checked');
        if (deleteCheckboxes.length > 0) {
            if (!confirm('Anda yakin ingin menghapus unit TEFA yang dipilih? Aksi ini tidak dapat dibatalkan.')) {
                e.preventDefault();
            }
        }
    });
</script>
@endpush
