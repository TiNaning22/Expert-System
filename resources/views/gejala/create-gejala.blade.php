@extends('layouts-dashboard.main')
@section('content')
<div class="container">
    <h1>Tambah Gejala</h1>
    <form action="/gejala" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_gejala" class="form-label">Kode Gejala</label>
            <input type="text" name="kode_gejala" id="kode_gejala" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_gejala" class="form-label">Nama Gejala</label>
            <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection