@extends('layouts.app')

@push('styles')
<style>
    .custom-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .custom-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.06); }

    /* Add Card */
    .add-card-body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 420px;
        height: 100%;
        cursor: pointer;
    }
    .add-circle-btn {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background-color: #5cb85c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        box-shadow: 0 4px 10px rgba(92,184,92,0.3);
        transition: transform 0.2s ease, background-color 0.2s ease;
        text-decoration: none;
        border: none;
    }
    .add-circle-btn:hover { transform: scale(1.06); background-color: #4cae4c; color: #fff; }
    .add-circle-btn svg { width: 34px; height: 34px; stroke-width: 2.8; }

    /* Profile Cards */
    .card-img-wrapper {
        width: 100%;
        max-height: 300px;
        background-color: #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .card-img-wrapper img {
        width: 100%;
        height: auto;
        max-height: 300px;
        object-fit: contain;
    }
    .profile-card-body {
        padding: 1.25rem 1.25rem 1rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .profile-name {
        font-size: 1.15rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.2rem;
        text-transform: lowercase;
    }
    .profile-nim {
        font-size: 0.8rem;
        color: #6c757d;
        margin-bottom: 0.6rem;
    }
    .profile-desc {
        font-size: 0.865rem;
        line-height: 1.5;
        color: #555e68;
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }
    .card-actions { display: flex; gap: 0.5rem; margin-top: auto; }
    .btn-custom-edit {
        color: #0d6efd; border: 1px solid #b6d4fe; background: #fff;
        font-size: 0.815rem; padding: 0.25rem 0.75rem; border-radius: 5px;
        text-decoration: none; transition: all 0.15s ease-in-out;
    }
    .btn-custom-edit:hover { background: #0d6efd; color: #fff; border-color: #0d6efd; }
    .btn-custom-delete {
        color: #dc3545; border: 1px solid #f8d7da; background: #fff;
        font-size: 0.815rem; padding: 0.25rem 0.75rem; border-radius: 5px;
        text-decoration: none; transition: all 0.15s ease-in-out; cursor: pointer;
    }
    .btn-custom-delete:hover { background: #dc3545; color: #fff; border-color: #dc3545; }
</style>
@endpush

@section('content')
<div class="row g-4 mb-4">
    {{-- Add Card --}}
    <div class="col-12 col-md-4">
        <div class="custom-card">
            <a href="{{ route('biodata.create') }}" class="add-card-body text-decoration-none" title="Tambah Biodata Baru">
                <span class="add-circle-btn" aria-label="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </span>
            </a>
        </div>
    </div>

    {{-- Profile Cards --}}
    @forelse ($biodatas as $biodata)
        <div class="col-12 col-md-4">
            <div class="custom-card">
                <div class="card-img-wrapper">
                    @if ($biodata->foto)
                        <img src="{{ asset('storage/' . $biodata->foto) }}" alt="{{ $biodata->nama }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($biodata->nama) }}&size=400&background=e5e7eb&color=555e68&bold=true" alt="{{ $biodata->nama }}">
                    @endif
                </div>
                <div class="profile-card-body">
                    <h2 class="profile-name">{{ $biodata->nama }}</h2>
                    <p class="profile-nim">NIM: {{ $biodata->nim }}</p>
                    <p class="profile-desc">{{ $biodata->deskripsi ?? '-' }}</p>
                    <div class="card-actions">
                        <a href="{{ route('biodata.edit', $biodata) }}" class="btn-custom-edit">Edit</a>
                        <form action="{{ route('biodata.destroy', $biodata) }}" method="POST" onsubmit="return confirm('Hapus biodata {{ addslashes($biodata->nama) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-custom-delete">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="text-muted text-center py-5">Belum ada biodata. Klik tombol + untuk menambahkan.</p>
        </div>
    @endforelse
</div>
@endsection
