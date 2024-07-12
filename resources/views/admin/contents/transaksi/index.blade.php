@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Transaksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            @if (Auth::user()->role == 'admin')
            <a href="/admin/transaksi/create" class="btn btn-primary mb-3">+ Transaksi</a>
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Akhir</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Biaya</th>
                            @if (Auth::user()->role == 'admin')
                            <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $transaksi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->tanggal }}</td>
                            <td>{{ $transaksi->mulai }}</td>
                            <td>{{ $transaksi->akhir }}</td>
                            <td>{{ $transaksi->keterangan }}</td>
                            <td>{{ $transaksi->biaya }}</td>
                            @if (Auth::user()->role == 'admin')
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="/admin/transaksi/edit/{{ $transaksi->id }}" class="btn btn-warning">Edit</a>
                                    <form action="/admin/transaksi/delete/{{ $transaksi->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
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
