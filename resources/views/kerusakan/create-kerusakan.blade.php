@extends('layouts-dashboard.main')
@section('content')
<div class="container">
    <h1>Tambah Kerusakan</h1>
    <form action="/kerusakan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kode_kerusakan" class="form-label">Kode Kerusakan</label>
            <input type="text" name="kode_kerusakan" id="kode_kerusakan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_kerusakan" class="form-label">Nama Kerusakan</label>
            <input type="text" name="nama_kerusakan" id="nama_kerusakan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="solusi" class="form-label">solusi</label>
            <textarea name="solusi" id="solusi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="biaya" class="form-label">biaya</label>
            <textarea name="biaya" id="biaya" class="form-control"></textarea>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="gambar" name="gambar">
            <label class="input-group-text" for="gambar">Upload</label>
          </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection