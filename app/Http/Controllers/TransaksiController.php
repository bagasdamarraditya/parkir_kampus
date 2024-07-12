<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // menampilkan data transaksi dari database
    public function index()
    {
        $transaksi = Transaksi::all();

        return view('admin.contents.transaksi.index', [
            'transaksi' => $transaksi
        ]);
    }

    public function create(){
        return view('admin.contents.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'keterangan' => 'required',
            'biaya' => 'required',
        ]);
    
        // Simpan ke database
        Transaksi::create([
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'akhir' => $request->akhir,
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
        ]);
    
        // Kembali ke halaman index kendaraan dengan pesan sukses
        return redirect('/admin/transaksi')->with('message', 'Data transaksi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);

        return view('admin.contents.transaksi.edit', [
            'transaksi' => $transaksi
        ]);
    }

    public function update($id, Request $request)
    {
        $transaksi = Transaksi::find($id);
    
        $request->validate([
            'tanggal' => 'required',
            'mulai' => 'required',
            'akhir' => 'required',
            'keterangan' => 'required',
            'biaya' => 'required',
        ]);
    
        // Update the transaction instance
        $transaksi->update([
            'tanggal' => $request->tanggal,
            'mulai' => $request->mulai,
            'akhir' => $request->akhir,
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
        ]);
    
        // Redirect to the transactions index page with a success message
        return redirect('/admin/transaksi')->with('message', 'Data transaksi berhasil diedit!');
    }

    public function destroy($id)
{
    // cari data kendaraan berdasarkan id
    $transaksi = Transaksi::find($id);

    // hapus kendaraan
    $transaksi->delete();

    // kembalikan ke halaman kendaraan
    return redirect('/admin/transaksi')->with('message', 'Data Transaksi berhasil dihapus!');
}
    
}
