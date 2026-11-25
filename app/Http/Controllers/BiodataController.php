<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BiodataController extends Controller
{
    /**
     * Tampilkan semua biodata (READ - index).
     */
    public function index(): View
    {
        $biodatas = Biodata::latest()->get();

        return view('biodata.index', compact('biodatas'));
    }

    /**
     * Form tambah biodata baru (CREATE - form).
     */
    public function create(): View
    {
        return view('biodata.create');
    }

    /**
     * Simpan biodata baru ke database (CREATE - store).
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:biodatas,nim',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        Biodata::create($validated);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata "'.$validated['nama'].'" berhasil ditambahkan.');
    }

    /**
     * Form edit biodata (UPDATE - form).
     */
    public function edit(Biodata $biodata): View
    {
        return view('biodata.edit', compact('biodata'));
    }

    /**
     * Simpan perubahan biodata (UPDATE - update).
     */
    public function update(Request $request, Biodata $biodata): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:biodatas,nim,'.$biodata->id,
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($biodata->foto) {
                $oldPath = public_path('images/'.$biodata->foto);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('foto');
            $filename = time().'_'.\Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $validated['foto'] = $filename;
        }

        $biodata->update($validated);

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata "'.$biodata->nama.'" berhasil diperbarui.');
    }

    /**
     * Hapus biodata dari database (DELETE).
     */
    public function destroy(Biodata $biodata): RedirectResponse
    {
        $nama = $biodata->nama;

        if ($biodata->foto) {
            $oldPath = public_path('images/'.$biodata->foto);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $biodata->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Biodata "'.$nama.'" berhasil dihapus.');
    }
}
