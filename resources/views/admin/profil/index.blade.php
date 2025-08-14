@extends('layouts.admin')

@section('title', 'Kelola Profil Sekolah')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulir Profil Sekolah</h3>
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

        <form action="{{ route('admin.profil.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Navigasi Tab -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="profil-tab" data-toggle="tab" href="#profil" role="tab" aria-controls="profil" aria-selected="true"><i class="fas fa-school mr-2"></i>Profil Utama</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="konten-tab" data-toggle="tab" href="#konten" role="tab" aria-controls="konten" aria-selected="false"><i class="fas fa-file-alt mr-2"></i>Konten Halaman</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="kepsek-tab" data-toggle="tab" href="#kepsek" role="tab" aria-controls="kepsek" aria-selected="false"><i class="fas fa-user-tie mr-2"></i>Kepala Sekolah</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false"><i class="fas fa-photo-video mr-2"></i>Media & Branding</a>
                </li>
            </ul>

            <!-- Konten Tab -->
            <div class="tab-content" id="myTabContent">
                
                <!-- Tab Profil Utama -->
                <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="profil-tab">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control @error('nama_sekolah') is-invalid @enderror" value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}" required>
                                @error('nama_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="npsn">NPSN</label>
                                <input type="text" name="npsn" id="npsn" class="form-control @error('npsn') is-invalid @enderror" value="{{ old('npsn', $profil->npsn ?? '') }}">
                                @error('npsn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                             <div class="form-group">
                                <label for="akreditasi">Akreditasi</label>
                                <input type="text" name="akreditasi" id="akreditasi" class="form-control @error('akreditasi') is-invalid @enderror" value="{{ old('akreditasi', $profil->akreditasi ?? '') }}" placeholder="Contoh: A (Unggul)">
                                @error('akreditasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="tahun_berdiri">Tahun Berdiri</label>
                                <input type="number" name="tahun_berdiri" id="tahun_berdiri" class="form-control @error('tahun_berdiri') is-invalid @enderror" value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}" placeholder="Contoh: 2005" min="1900" max="{{ date('Y') }}">
                                @error('tahun_berdiri')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                                @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp', $profil->no_telp ?? '') }}" required>
                                @error('no_telp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profil->email ?? '') }}" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="jam_operasional">Jam Operasional</label>
                                <textarea name="jam_operasional" id="jam_operasional" class="form-control @error('jam_operasional') is-invalid @enderror" rows="3" placeholder="Contoh: Senin - Jumat: 07:00 - 15:00">{{ old('jam_operasional', $profil->jam_operasional) }}</textarea>
                                @error('jam_operasional')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Konten Halaman -->
                <div class="tab-pane fade" id="konten" role="tabpanel" aria-labelledby="konten-tab">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sejarah">Sejarah</label>
                                <textarea name="sejarah" id="sejarah" class="form-control @error('sejarah') is-invalid @enderror" rows="8" required>{{ old('sejarah', $profil->sejarah ?? '') }}</textarea>
                                @error('sejarah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <textarea name="visi" id="visi" class="form-control @error('visi') is-invalid @enderror" rows="8" required>{{ old('visi', $profil->visi ?? '') }}</textarea>
                                @error('visi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="misi">Misi</label>
                                <textarea name="misi" id="misi" class="form-control @error('misi') is-invalid @enderror" rows="8" required>{{ old('misi', $profil->misi ?? '') }}</textarea>
                                @error('misi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Kepala Sekolah -->
                <div class="tab-pane fade" id="kepsek" role="tabpanel" aria-labelledby="kepsek-tab">
                     <div class="row mt-4">
                        <div class="col-md-8">
                             <div class="form-group">
                                <label for="kepala_sekolah">Nama Kepala Sekolah</label>
                                <input type="text" name="kepala_sekolah" id="kepala_sekolah" class="form-control @error('kepala_sekolah') is-invalid @enderror" value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}">
                                @error('kepala_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="sambutan_kepala">Sambutan Kepala Sekolah</label>
                                <textarea name="sambutan_kepala" id="sambutan_kepala" class="form-control @error('sambutan_kepala') is-invalid @enderror" rows="10">{{ old('sambutan_kepala', $profil->sambutan_kepala ?? '') }}</textarea>
                                @error('sambutan_kepala')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label for="foto_kepala_sekolah">Foto Kepala Sekolah</label>
                                <input type="file" name="foto_kepala_sekolah" id="foto_kepala_sekolah" class="form-control-file @error('foto_kepala_sekolah') is-invalid @enderror">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto. Max 2MB.</small>
                                @if(isset($profil->foto_kepala_sekolah) && $profil->foto_kepala_sekolah)
                                    <img src="{{ Storage::url($profil->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah" class="img-thumbnail mt-2" width="200">
                                @endif
                                @error('foto_kepala_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                        <label for="foto_gedung">Foto Gedung Sekolah</label>
                        <input type="file" name="foto_gedung" id="foto_gedung" class="form-control-file @error('foto_gedung') is-invalid @enderror">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto. Max 2MB.</small>
                        @if($profil->foto_gedung)
                            <img src="{{ Storage::url($profil->foto_gedung) }}" alt="Foto Gedung" class="img-thumbnail mt-2" width="300">
                        @endif
                        @error('foto_gedung')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                        </div>
                     </div>
                </div>

                <!-- Tab Media & Branding -->
                <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo Sekolah</label>
                                <input type="file" name="logo" id="logo" class="form-control-file @error('logo') is-invalid @enderror">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah logo. Max 2MB.</small>
                                @if(isset($profil->logo) && $profil->logo)
                                    <img src="{{ Storage::url($profil->logo) }}" alt="Logo" class="img-thumbnail mt-2" width="150">
                                @endif
                                @error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                             <hr>
                             {{-- Social Media Inputs --}}
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                    </div>
                                    <input type="text" name="facebook_url" id="facebook" class="form-control @error('facebook_url') is-invalid @enderror" value="{{ old('facebook_url', $profil->facebook_url ?? '') }}" placeholder="Hanya username, contoh: smkn1cipatat">
                                </div>
                                <small class="form-text text-muted">Cukup masukkan username atau nama halaman Anda.</small>
                                @error('facebook_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                    </div>
                                    <input type="text" name="instagram_url" id="instagram" class="form-control @error('instagram_url') is-invalid @enderror" value="{{ old('instagram_url', $profil->instagram_url ?? '') }}" placeholder="Hanya username, contoh: smkn1cipatat">
                                </div>
                                <small class="form-text text-muted">Cukup masukkan username Anda (tanpa @).</small>
                                @error('instagram_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                    </div>
                                    <input type="text" name="youtube_url" id="youtube" class="form-control @error('youtube_url') is-invalid @enderror" value="{{ old('youtube_url', $profil->youtube_url ?? '') }}" placeholder="Hanya username channel">
                                </div>
                                 <small class="form-text text-muted">Cukup masukkan username channel Anda.</small>
                                @error('youtube_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                             <div class="form-group">
                                <label for="tiktok">TikTok</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                                    </div>
                                    <input type="text" name="tiktok_url" id="tiktok" class="form-control @error('tiktok_url') is-invalid @enderror" value="{{ old('tiktok_url', $profil->tiktok_url ?? '') }}" placeholder="Hanya username, contoh: smkn1cipatat.official">
                                </div>
                                <small class="form-text text-muted">Cukup masukkan username Anda (tanpa @).</small>
                                @error('tiktok_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="maps">Embed Code Google Maps</label>
                                <textarea name="maps" id="maps" class="form-control @error('maps') is-invalid @enderror" rows="8" placeholder="Salin tempel kode iframe dari Google Maps di sini">{{ old('maps', $profil->maps ?? '') }}</textarea>
                                @error('maps')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                @if (isset($profil->maps) && $profil->maps)
                                    <div class="mt-2">
                                        <small>Preview Peta:</small>
                                        <div class="embed-responsive embed-responsive-16by9">
                                            {!! $profil->maps !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-right mt-3 bg-white border-top">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<style>
    .tab-content {
        border: 1px solid #dee2e6;
        border-top: none;
        padding: 1.5rem;
        border-radius: 0 0 .25rem .25rem;
    }
    .input-group-text {
        width: 42px; /* Atur lebar agar ikon rapi */
        justify-content: center;
    }
</style>
@endpush
