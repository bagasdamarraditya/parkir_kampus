@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Area Parkir</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Area Parkir</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            @if (Auth::user()->role == 'admin')
            <a href="/admin/area_parkir/create" class="btn btn-primary mb-3">+ Area Parkir</a>
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kapasitas</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Kampus</th>
                            @if (Auth::user()->role == 'admin')
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($areaParkir as $parkir)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $parkir->nama }}</td>
                            <td>{{ $parkir->kapasitas }}</td>
                            <td>{{ $parkir->keterangan }}</td>
                            <td>{{ $parkir->kampus->nama }}</td>
                            @if (Auth::user()->role == 'admin')
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="/admin/area_parkir/edit/{{ $parkir->id }}" class="btn btn-warning">Edit</a>
                                    <form action="/admin/area_parkir/delete/{{ $parkir->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
