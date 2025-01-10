@extends('layouts-dashboard.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Kerusakan
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode Kerusakan</th>
                    <th>Nama Kerusakan</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th>Kisaran Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kerusakan as $k)
                <tr>
                    <td>{{ $k->kode_kerusakan }}</td>
                    <td>{{ $k->nama_kerusakan }}</td>
                    <td>{{ $k->deskripsi }}</td>
                    <td>{{ $k->solusi }}</td>
                    <td>{{ $k->biaya }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->nama_kerusakan }}" width="50rem" height="50rem">
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $k->kode_kerusakan }}">Edit</button>
                        <form action="{{ route('kerusakan.destroy', $k->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $k->kode_kerusakan }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Kerusakan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('kerusakan/'.$k->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kode_kerusakan" class="form-label">Kode Kerusakan</label>
                                        <input type="text" class="form-control" id="kode_kerusakan" name="kode_kerusakan" value="{{ $k->kode_kerusakan }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_kerusakan" class="form-label">Nama Kerusakan</label>
                                        <input type="text" class="form-control" id="nama_kerusakan" name="nama_kerusakan" value="{{ $k->nama_kerusakan }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $k->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="solusi" class="form-label">Solusi</label>
                                        <textarea class="form-control" id="solusi" name="solusi" rows="3">{{ $k->solusi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="biaya" class="form-label">Kisaran Harga</label>
                                        <input type="number" class="form-control" id="biaya" name="biaya" value="{{ $k->biaya }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="gambar" name="gambar">
                                        <img src="{{ asset('storage/' . $k->gambar) }}" alt="Preview" class="mt-2" width="100">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <a href="kerusakan/create"><button class="btn btn-primary" id="btnNavbarSearch" type="button">Tambah Data</button></a>
    </div>
</div>

@endsection