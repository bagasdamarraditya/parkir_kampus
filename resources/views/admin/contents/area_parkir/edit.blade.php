@extends('admin.main')

@section('content')
    <div class="pagetitle">
        <h1>Edit Area Parkir</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/area_parkir">Area Parkir</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/area_parkir/update/{{ $areaParkir->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama Area Parkir</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" required value="{{ $areaParkir->nama ?? old('nama') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kapasitas" class="col-4 col-form-label">Kapasitas</label>
                        <div class="col-8">
                            <input id="kapasitas" name="kapasitas" type="number" class="form-control" required value="{{ $areaParkir->kapasitas ?? old('kapasitas') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                        <div class="col-8">
                            <textarea id="keterangan" name="keterangan" cols="40" rows="5" class="form-control" required>{{ $areaParkir->keterangan ?? old('keterangan') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kampus_id" class="col-4 col-form-label">Kampus</label>
                        <div class="col-8">
                            <select id="kampus_id" name="kampus_id" class="form-control" required>
                                @foreach($kampuses as $kampus)
                                    <option value="{{ $kampus->id }}" {{ $areaParkir->kampus_id == $kampus->id ? 'selected' : '' }}>
                                        {{ $kampus->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
