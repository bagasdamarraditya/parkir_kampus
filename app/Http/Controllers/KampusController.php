<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    // Menampilkan data kampus dari database
    public function index()
    {
        // Mendapatkan data dari tabel kampus
        $kampuses = Kampus::all();


        // Kirim data ke view untuk ditampilkan
        return view('admin.contents.kampus.index', [
            'kampuses' => $kampuses
        ]);
    }

    public function create()
    {
        return view('admin.contents.kampus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simpan ke database
        Kampus::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // Kembali ke halaman index kampus dengan pesan sukses
        return redirect('/admin/kampus')->with('message', 'Data kampus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kampus = Kampus::find($id);

        return view('admin.contents.kampus.edit', [
            'kampus' => $kampus
        ]);
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan id
        $kampus = Kampus::find($id);

        // Validasi request
        $request->validate([
            'nama' => 'required|max:20',
            'alamat' => 'required|max:45',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Update data di database
        $kampus->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // Kembali ke halaman kampus
        return redirect('/admin/kampus')->with('message', 'Data kampus berhasil diedit!');
    }

    public function destroy($id)
    {
        // Cari data kampus berdasarkan id
        $kampus = Kampus::find($id);

        // Hapus kampus
        $kampus->delete();

        // Kembalikan ke halaman kampus
        return redirect('/admin/kampus')->with('message', 'Data kampus berhasil dihapus!');
    }
}