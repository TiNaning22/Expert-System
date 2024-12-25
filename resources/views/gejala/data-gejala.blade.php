@extends('layouts-dashboard.main')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Gejala
    </div>
    <div class="card-body">
        <table id="datatablesSimple">     
            <thead>
                <tr>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>MB</th>
                    <th>MD</th>
                </tr>
            </thead>
            @foreach ($gejala as $gejala)
                <tr>
                    <td>{{ $gejala->kode_gejala }}</td>
                    <td>{{ $gejala->nama_gejala }}</td>
                    <td>{{ $gejala->mb }}</td>
                    <td>{{ $gejala->md }}</td>
                </tr>
            @endforeach
        </table>
        <a href="gejala/create"><button class="btn btn-primary" id="btnNavbarSearch" type="button">Tambah Data</button></a>
        
    </div>
</div>
@endsection