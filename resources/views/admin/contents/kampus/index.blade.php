@extends('admin.main')

@section('content')
    <div class="pagetitle">
        <h1>Kampus</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Kampus</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (Auth::user()->role == 'admin')
                    <a href="/admin/kampus/create" class="btn btn-primary mb-3">+ Kampus</a>
                @endif
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kampuses as $kampus)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kampus->nama }}</td>
                                    <td>{{ $kampus->alamat }}</td>
                                    <td>{{ $kampus->latitude }}</td>
                                    <td>{{ $kampus->longitude }}</td>
                                    @if (Auth::user()->role == 'admin')
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/admin/kampus/edit/{{ $kampus->id }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="/admin/kampus/delete/{{ $kampus->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
