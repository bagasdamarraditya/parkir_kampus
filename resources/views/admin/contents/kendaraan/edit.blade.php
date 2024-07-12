@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Edit Kendaraan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Kendaraan</li>
                <li class="breadcrumb-item active">Edit Kendaraan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <form action="/admin/kendaraan/update/{{ $kendaraan->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="merk" class="col-4 col-form-label">Merk</label>
                        <div class="col-8">
                            <input id="merk" name="merk" type="text" class="form-control" required="required" value="{{ $kendaraan->merk ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pemilik" class="col-4 col-form-label">Pemilik</label>
                        <div class="col-8">
                            <input id="pemilik" name="pemilik" type="text" class="form-control" required="required" value="{{ $kendaraan->pemilik ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nopol" class="col-4 col-form-label">Nopol</label>
                        <div class="col-8">
                            <input id="nopol" name="nopol" type="text" class="form-control" required="required" value="{{ $kendaraan->nopol ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="thn_beli" class="col-4 col-form-label">Tahun Beli</label>
                        <div class="col-8">
                            <input id="thn_beli" name="thn_beli" type="text" class="form-control" required="required" value="{{ $kendaraan->thn_beli ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                        <div class="col-8">
                            <textarea id="deskripsi" name="deskripsi" cols="40" rows="5" class="form-control" required="required">{{ $kendaraan->deskripsi ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kendaraan_id" class="col-4 col-form-label">Jenis Kendaraan</label>
                        <div class="col-8">
                            <select id="jenis_kendaraan_id" name="jenis_kendaraan_id" class="form-control" required="required">
                                @foreach($jenis_kendaraan as $jenis)
                                    <option value="{{ $jenis->id }}"{{ $kendaraan->jenis_kendaraan_id == $jenis->id ? 'selected' : '' }}>{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kapasitas_kursi" class="col-4 col-form-label">Kapasitas Kursi</label>
                        <div class="col-8">
                            <input id="kapasitas_kursi" name="kapasitas_kursi" type="text" class="form-control" required="required" value="{{ $kendaraan->kapasitas_kursi ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rating" class="col-4 col-form-label">Rating</label>
                        <div class="col-8">
                            <input id="rating" name="rating" type="text" class="form-control" required="required" value="{{ $kendaraan->rating ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
