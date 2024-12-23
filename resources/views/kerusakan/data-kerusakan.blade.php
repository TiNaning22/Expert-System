@extends('layouts-dashboard.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Kerusakan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Kode Kerusakan</th>
                    <th>Nama Kerusakan</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th>Kisaran Harga</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            @foreach ($kerusakan as $kerusakan)
                <tr>
                    <td>{{ $kerusakan->kode_kerusakan }}</td>
                    <td>{{ $kerusakan->nama_kerusakan }}</td>
                    <td>{{ $kerusakan->deskripsi }}</td>
                    <td>{{ $kerusakan->solusi }}</td>
                    <td>{{ $kerusakan->biaya }}</td>
                    <td><img src="{{ asset('storage/' . $kerusakan->gambar) }}" alt="{{ $kerusakan->nama_kerusakan }}" srcset="" width="50rem" height="50rem"></td>
                </tr>
            @endforeach
        </table>
        <a href="kerusakan/create"><button class="btn btn-primary" id="btnNavbarSearch" type="button">Tambah Data</button></a>
    </div>
</div>
@endsection