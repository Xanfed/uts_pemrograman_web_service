@extends('layouts.app')

@section('content')
<div class="row g-4 mb-4">
    {{-- Add Card --}}
    <div class="col-12 col-md-4">
        <div class="card h-100 border rounded-3 shadow-sm">
            <a href="{{ route('biodata.create') }}"
               class="card-body d-flex align-items-center justify-content-center text-decoration-none"
               style="min-height: 420px;"
               title="Tambah Biodata Baru">
                <span class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center shadow-sm"
                      style="width: 72px; height: 72px;" aria-label="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </span>
            </a>
        </div>
    </div>

    {{-- Profile Cards --}}
    @forelse ($biodatas ?? [] as $biodata)
        <div class="col-12 col-md-4">
            <div class="card h-100 border rounded-3 shadow-sm overflow-hidden">
                <div class="bg-light d-flex align-items-center justify-content-center overflow-hidden" style="height: 260px;">
                    @if ($biodata->foto)
                        <img src="{{ asset('images/' . $biodata->foto) }}" class="w-100 h-100 object-fit-cover" alt="{{ $biodata->nama }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($biodata->nama) }}&size=400&background=e5e7eb&color=555e68&bold=true" class="w-100 h-100 object-fit-cover" alt="{{ $biodata->nama }}">
                    @endif
                </div>
                <div class="card-body d-flex flex-column">
                    <h2 class="h5 fw-bold text-lowercase mb-1">{{ $biodata->nama }}</h2>
                    <p class="small text-secondary mb-2">NIM: {{ $biodata->nim }}</p>
                    <p class="small text-muted mb-4 flex-grow-1">{{ $biodata->deskripsi ?? '-' }}</p>
                    <div class="d-flex gap-2 mt-auto">
                        <a href="{{ route('biodata.edit', $biodata) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('biodata.destroy', $biodata) }}" method="POST" onsubmit="return confirm('Hapus biodata {{ addslashes($biodata->nama) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
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
