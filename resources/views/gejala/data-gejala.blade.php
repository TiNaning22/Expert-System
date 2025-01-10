@extends('layouts-dashboard.main')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Gejala
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gejala as $g)
                <tr>
                    <td>{{ $g->kode_gejala }}</td>
                    <td>{{ $g->nama_gejala }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $g->kode_gejala }}">Edit</button>
                        <form action="{{ url('gejala/'.$g->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                    
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $g->kode_gejala }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Gejala</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ url('gejala/'.$g->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="kode_gejala" class="form-label">Kode Gejala</label>
                                        <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" value="{{ $g->kode_gejala }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_gejala" class="form-label">Nama Gejala</label>
                                        <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="{{ $g->nama_gejala }}">
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
        <a href="gejala/create"><button class="btn btn-primary" id="btnNavbarSearch" type="button">Tambah Data</button></a>
    </div>
</div>

@endsection