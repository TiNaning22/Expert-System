@extends('layouts-user.main')
@section('konten')
<div class="container mt-5">
    <h1 class="text-center mb-4">Diagnosa Gejala</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Keterangan Gejala</th>
                        <th scope="col" class="text-center">MB</th>
                        <th scope="col" class="text-center">MD</th>
                        <th scope="col" class="text-center">CF</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contoh data gejala -->
                    @foreach($gejala as $gejala)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gejala->nama_gejala }}</td>
                        <td class="text-center">{{ $gejala->mb }}</td>
                        <td class="text-center">{{ $gejala->md }}</td>
                        <td class="text-center">
                            {{ number_format($gejala->mb - $gejala->md, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center mt-4">
        <button class="btn btn-primary">Lanjutkan Diagnosa</button>
    </div>
</div>
@endsection