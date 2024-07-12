@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>+ Area Parkir</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Area Parkir</li>
            <li class="breadcrumb-item active">+ Area Parkir</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

            <form action="/admin/area_parkir/store" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="nama" class="col-4 col-form-label">Nama Area Parkir</label>
                    <div class="col-8">
                        <input id="nama" name="nama" type="text" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kapasitas" class="col-4 col-form-label">Kapasitas</label>
                    <div class="col-8">
                        <input id="kapasitas" name="kapasitas" type="number" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                    <div class="col-8">
                        <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control" required="required"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kampus_id" class="col-4 col-form-label">Kampus</label>
                    <div class="col-8">
                        <select id="kampus_id" name="kampus_id" class="form-control" required="required">
                            @foreach($kampuses as $kampus)
                                <option value="{{ $kampus->id }}">{{ $kampus->nama }}</option>
                            @endforeach
                        </select>
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