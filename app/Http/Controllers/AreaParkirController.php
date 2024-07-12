<?php

namespace App\Http\Controllers;

use App\Models\AreaParkir;
use App\Models\Kampus;
use Illuminate\Http\Request;

class AreaParkirController extends Controller
{
    // method untuk menampilkan data area parkir
    public function index()
    {
        // tarik data area parkir dari db
        $areaParkir = AreaParkir::all();

        // panggil view
        return view('admin.contents.area_parkir.index', [
            'areaParkir' => $areaParkir,
        ]);
    }

    // method untuk menampilkan form tambah area parkir
    public function create()
    {
        $kampuses = Kampus::all();

        return view('admin.contents.area_parkir.create', [
            'kampuses' => $kampuses,
        ]);
    }

    // method untuk menyimpan data area parkir
    public function store(Request $request)
    {
        // validasi data yang diterapkan 
        $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required',
            'keterangan' => 'required',
            'kampus_id' => 'required|exists:kampuses,id', // Tambahkan validasi untuk kampus_id
        ]);

        AreaParkir::create([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
            'keterangan' => $request->keterangan,
            'kampus_id' => $request->kampus_id,
        ]);

        return redirect('admin/area_parkir')->with('message', 'Data area parkir berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // cari data berdasarkan id 
        $areaParkir = AreaParkir::find($id);
        $kampuses = Kampus::all();


        return view('admin.contents.area_parkir.edit', [
            'areaParkir' => $areaParkir,
            'kampuses' => $kampuses,
        ]);
    }

    // method untuk mengupdate data area parkir
    public function update(Request $request, $id)
    {
        $areaParkir = AreaParkir::find($id);

        // validasi data yang diterapkan 
        $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required',
            'keterangan' => 'required',
            'kampus_id' => 'required|exists:kampuses,id', // Tambahkan validasi untuk kampus_id
        ]);

        $areaParkir->update([
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
            'keterangan' => $request->keterangan,
            'kampus_id' => $request->kampus_id,
        ]);

        return redirect('admin/area_parkir')->with('message', 'Data area parkir berhasil diedit!');
    }

    // method untuk menghapus data area parkir
    public function destroy($id)
    {
        $areaParkir = AreaParkir::find($id);

        // hapus
        $areaParkir->delete();

        return redirect('admin/area_parkir')->with('message', 'Data area parkir berhasil dihapus!');
    }
}
