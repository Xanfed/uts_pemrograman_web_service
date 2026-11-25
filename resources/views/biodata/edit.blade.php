@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-7 col-lg-6">
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('biodata.index') }}" class="text-secondary text-decoration-none" style="font-size:1.3rem;">&larr;</a>
            <h1 class="h4 fw-bold mb-0">Edit Biodata</h1>
        </div>

        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-4">
                <form action="{{ route('biodata.update', $biodata) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label small fw-semibold text-secondary">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               id="nama" name="nama" value="{{ old('nama', $biodata->nama) }}"
                               placeholder="Masukkan nama lengkap..." required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nim" class="form-label small fw-semibold text-secondary">NIM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror"
                               id="nim" name="nim" value="{{ old('nim', $biodata->nim) }}"
                               placeholder="Masukkan NIM..." required>
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label small fw-semibold text-secondary">Deskripsi / Tugas</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                  id="deskripsi" name="deskripsi" rows="3"
                                  placeholder="Masukkan rincian tugas...">{{ old('deskripsi', $biodata->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="form-label small fw-semibold text-secondary">Foto</label>
                        @if ($biodata->foto)
                            <div class="mb-2">
                                <img src="{{ asset('images/' . $biodata->foto) }}" alt="Foto saat ini"
                                     style="height: 100px; border-radius: 8px; object-fit: cover;">
                                <p class="form-text mt-1">Unggah foto baru untuk mengganti yang lama.</p>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                               id="foto" name="foto" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, WEBP. Maks 2MB.</div>
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('biodata.index') }}" class="btn btn-light btn-sm px-3">Batal</a>
                        <button type="submit" class="btn btn-primary btn-sm px-3">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
