<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pelapor'=> 'required|string',
            'terlapor'=> 'required|string',
            'kelas'=> 'required|string',
            'laporan'=> 'required|string',
            'bukti'=> 'required|image',
        ]);
		
        if ($request->hasFile('bukti')) {
            $imagePath = $request->file('bukti')->store('bukti', 'public');
        }

        Siswa::create([
            'pelapor' => $request->pelapor,
            'terlapor' => $request->terlapor,
            'kelas' => $request->kelas,
            'laporan' => $request->laporan,
            'bukti' => $imagePath,
            'status' => 'sedang dalam tinjauan',
        ]);

        return redirect()->route('siswa.index')->with('success', 'Laporan berhasil ditambahkan');
    }

    public function index()
    {
        // Ambil semua data siswa dari database
        $siswas = Siswa::all();

        // Kirim data siswa ke view index.blade.php
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function edit($id)
    {
        // Ambil data siswa berdasarkan ID
        $siswa = Siswa::findOrFail($id);

        // Kirim data siswa ke view edit.blade.php
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelapor'=> 'required|string',
            'terlapor'=> 'required|string',
            'kelas'=> 'required|string',
            'laporan'=> 'required|string',
            'bukti'=> 'nullable|image',
        ]);

        $siswa = Siswa::findOrFail($id);

        if ($request->hasFile('bukti')) {
            // Hapus bukti lama jika ada
            if ($siswa->bukti && file_exists(storage_path('app/public/' . $siswa->bukti))) {
                unlink(storage_path('app/public/' . $siswa->bukti));
            }

            // Simpan bukti baru
            $imagePath = $request->file('bukti')->store('bukti', 'public');
            $siswa->bukti = $imagePath;
        }

        // Update data siswa
        $siswa->update([
            'pelapor' => $request->pelapor,
            'terlapor' => $request->terlapor,
            'kelas' => $request->kelas,
            'laporan' => $request->laporan,
            'bukti' => $siswa->bukti,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus file bukti jika ada
        if ($siswa->bukti && file_exists(storage_path('app/public/' . $siswa->bukti))) {
            unlink(storage_path('app/public/' . $siswa->bukti));
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Laporan berhasil dihapus');
    }
}
