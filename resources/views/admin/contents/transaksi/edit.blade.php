@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Edit Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Transaksi</li>
        <li class="breadcrumb-item active">Edit Transaksi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          
          <form action="/admin/transaksi/update/{{ $transaksi->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label for="tanggal" class="col-4 col-form-label">Tanggal</label> 
              <div class="col-8">
                <input id="tanggal" name="tanggal" type="date" class="form-control" required="required" value="{{ $transaksi->tanggal ?? '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="mulai" class="col-4 col-form-label">Mulai</label> 
              <div class="col-8">
                <input id="mulai" name="mulai" type="time" class="form-control" required="required" value="{{ $transaksi->mulai ?? '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="akhir" class="col-4 col-form-label">Akhir</label> 
              <div class="col-8">
                <input id="akhir" name="akhir" type="time" class="form-control" required="required" value="{{ $transaksi->akhir ?? '' }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="keterangan" class="col-4 col-form-label">Keterangan</label> 
              <div class="col-8">
                <textarea id="keterangan" name="keterangan" cols="40" rows="3" class="form-control" required="required">{{ $transaksi->keterangan ?? '' }}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="biaya" class="col-4 col-form-label">Biaya</label> 
              <div class="col-8">
                <input id="biaya" name="biaya" type="text" class="form-control" required="required" value="{{ $transaksi->biaya ?? '' }}">
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