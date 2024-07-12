@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Kendaraan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Kendaraan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body">
            <a href="/admin/kendaraan/create" class="btn btn-primary mb-3">+ Kendaraan</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Nopol</th>
                            <th scope="col">Tahun Beli</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Jenis Kendaraan</th>
                            <th scope="col">Kapasitas Kursi</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kendaraan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->pemilik }}</td>
                            <td>{{ $item->nopol }}</td>
                            <td>{{ $item->thn_beli }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->jenis->nama }}</td> <!-- Tampilkan nama jenis kendaraan -->
                            <td>{{ $item->kapasitas_kursi }}</td>
                            <td>{{ $item->rating }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="/admin/kendaraan/edit/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                    @if (Auth::user()->role == 'admin')
                                    <form action="/admin/kendaraan/delete/{{ $item->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
