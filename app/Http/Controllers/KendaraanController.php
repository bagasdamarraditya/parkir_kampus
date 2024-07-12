<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Jenis; // Pastikan model Jenis diimpor
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan data kendaraan dari database
    public function index()
    {
        // Mendapatkan data dari tabel kendaraan beserta relasinya dengan jenis
        $kendaraan = Kendaraan::with('jenis')->get();

        // Kirim data ke view untuk ditampilkan
        return view('admin.contents.kendaraan.index', [
            'kendaraan' => $kendaraan
        ]);
    }

    public function create()
    {
        // Mengambil semua jenis kendaraan untuk dipilih di form tambah
        $jenis_kendaraan = Jenis::all();

        return view('admin.contents.kendaraan.create', [
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'pemilik' => 'required',
            'nopol' => 'required',
            'thn_beli' => 'required|numeric',
            'deskripsi' => 'required',
            'jenis_kendaraan_id' => 'required|nullable',
            'kapasitas_kursi' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);
    
        // Simpan ke database
        Kendaraan::create($request->all());
    
        // Kembali ke halaman index kendaraan dengan pesan sukses
        return redirect('/admin/kendaraan')->with('message', 'Data kendaraan berhasil ditambahkan!');
    }
    
    public function edit($id)
    {
        // Cari data kendaraan berdasarkan id beserta relasinya dengan jenis
        $kendaraan = Kendaraan::with('jenis')->find($id);

        // Mengambil semua jenis kendaraan untuk dipilih di form edit
        $jenis_kendaraan = Jenis::all();

        return view('admin.contents.kendaraan.edit', [
            'kendaraan' => $kendaraan,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    public function update($id, Request $request)
    {
        // Cari data kendaraan berdasarkan id
        $kendaraan = Kendaraan::find($id);

        // Validasi request
        $request->validate([
            'merk' => 'required',
            'pemilik' => 'required',
            'nopol' => 'required',
            'thn_beli' => 'required|numeric',
            'deskripsi' => 'required',
            'jenis_kendaraan_id' => 'required|exists:jenis,id',
            'kapasitas_kursi' => 'required|numeric',
            'rating' => 'required|numeric',
        ]);

        // Update data di database
        $kendaraan->update($request->all());

        // Kembali ke halaman kendaraan dengan pesan sukses
        return redirect('/admin/kendaraan')->with('message', 'Data kendaraan berhasil diedit!');
    }

    public function destroy($id)
    {
        // Cari data kendaraan berdasarkan id
        $kendaraan = Kendaraan::find($id);

        // Hapus kendaraan
        $kendaraan->delete();

        // Kembali ke halaman kendaraan dengan pesan sukses
        return redirect('/admin/kendaraan')->with('message', 'Data kendaraan berhasil dihapus!');
    }
}
