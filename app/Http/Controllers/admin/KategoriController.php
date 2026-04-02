<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // List semua kategori (TIDAK DIUBAH)
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.kategori.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string|max:255|unique:kategori,keterangan',
        ]);

        Kategori::create([
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // Form edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.kategori.index')->with('error', 'ID kategori diperlukan');
        }
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'keterangan' => 'required|string|max:255|unique:kategori,keterangan,' . $id . ',id_kategori',
        ]);

        $kategori->update([
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    // Hapus
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil dihapus');
    }
}