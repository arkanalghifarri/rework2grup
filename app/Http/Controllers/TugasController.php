<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Menampilkan semua data tugas.
     */
    public function index()
    {
        $tugas = Tugas::latest()->get();

        return view('tugas.index', compact('tugas'));
    }

    /**
     * Menampilkan form tambah tugas.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Menyimpan tugas baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable',
            'status' => 'required',
        ]);

        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit tugas.
     */
    public function edit(Tugas $tuga)
    {
        return view('tugas.edit', compact('tuga'));
    }

    /**
     * Memperbarui tugas di database.
     */
    public function update(Request $request, Tugas $tuga)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable',
            'status' => 'required',
        ]);

        $tuga->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil diperbarui.');
    }

    /**
     * Menghapus tugas.
     */
    public function destroy(Tugas $tuga)
    {
        $tuga->delete();

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }
}