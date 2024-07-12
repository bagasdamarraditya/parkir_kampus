@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>+ Kendaraan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/kendaraan">Kendaraan</a></li>
            <li class="breadcrumb-item active">Tambah Kendaraan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">

            <form action="/admin/kendaraan/store" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                    <div class="col-sm-8">
                        <input id="merk" name="merk" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pemilik" class="col-sm-4 col-form-label">Pemilik</label>
                    <div class="col-sm-8">
                        <input id="pemilik" name="pemilik" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nopol" class="col-sm-4 col-form-label">Nopol</label>
                    <div class="col-sm-8">
                        <input id="nopol" name="nopol" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="thn_beli" class="col-sm-4 col-form-label">Tahun Beli</label>
                    <div class="col-sm-8">
                        <input id="thn_beli" name="thn_beli" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                    <div class="col-sm-8">
                        <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kendaraan_id" class="col-sm-4 col-form-label">Jenis Kendaraan</label>
                    <div class="col-sm-8">
                        <select id="jenis_kendaraan_id" name="jenis_kendaraan_id" class="form-control" required>
                            @foreach($jenis_kendaraan as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                <div class="form-group row">
                    <label for="kapasitas_kursi" class="col-sm-4 col-form-label">Kapasitas Kursi</label>
                    <div class="col-sm-8">
                        <input id="kapasitas_kursi" name="kapasitas_kursi" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rating" class="col-sm-4 col-form-label">Rating</label>
                    <div class="col-sm-8">
                        <input id="rating" name="rating" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
