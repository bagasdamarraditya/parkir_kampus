<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    // Method untuk menampilkan semua jenis kendaraan
    public function index()
    {
        // Mendapatkan semua data jenis kendaraan dari database
        $jenis = Jenis::all();

        // Kirim data ke view untuk ditampilkan
        return view('admin.contents.jenis.index', [
            'jenis' => $jenis
        ]);

    }

    public function create()
    {
        return view('admin.contents.jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        // Simpan ke database
        Jenis::create([
            'nama' => $request->nama,
        ]);

        // Kembali ke halaman index kampus dengan pesan sukses
        return redirect('/admin/jenis')->with('message', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jenis = Jenis::find($id);

        return view('admin.contents.jenis.edit', [
            'jenis' => $jenis
        ]);
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan id
        $jenis = Jenis::find($id);

        // Validasi request
        $request->validate([
            'nama' => 'required',
        ]);

        // Update data di database
        $jenis->update([
            'nama' => $request->nama,
        ]);

        // Kembali ke halaman kampus
        return redirect('/admin/jenis')->with('message', 'Data berhasil diedit!');
    }

    public function destroy($id)
    {
        // Cari data kampus berdasarkan id
        $jenis = Jenis::find($id);

        // Hapus kampus
        $jenis->delete();

        // Kembalikan ke halaman kampus
        return redirect('/admin/jenis')->with('message', 'Data kampus berhasil dihapus!');
    }
}

