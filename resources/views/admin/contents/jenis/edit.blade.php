@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Edit Jenis</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Jenis</li>
                <li class="breadcrumb-item active">Edit Jenis</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

                <form action="/admin/jenis/update/{{ $jenis->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" required="required" value="{{ $jenis->nama ?? '' }}">
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