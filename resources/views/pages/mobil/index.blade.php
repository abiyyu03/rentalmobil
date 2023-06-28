@extends('template.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Mobil</h1>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Data Mobil</li>
            </ol>
            <a href="/mobil/create" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mobil</th>
                                <th>Merk</th>
                                <th>CC</th>
                                <th>Tahun Mobil</th>
                                <th>Nomor Polisi</th>
                                <th>Warna</th>
                                <th>Tipe Mobil</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobilData as $mobil)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mobil->nama_mobil }}</td>
                                    <td>{{ $mobil->merk_id }}</td>
                                    <td>{{ $mobil->cc }}</td>
                                    <td>{{ $mobil->tahun_mobil }}</td>
                                    <td>{{ $mobil->nomor_polisi }}</td>
                                    <td>{{ $mobil->warna }}</td>
                                    <td>{{ $mobil->tipe_mobil_id }}</td>
                                    <td>{{ $mobil->foto }}</td>
                                    <td>
                                        <a href="/mobil/edit/{{ $mobil->id }}" class="btn btn-warning">Edit</a>
                                        <a href="/mobil/delete/{{ $mobil->id }}" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
