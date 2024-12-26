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
                        <th scope="col">Tingkat Keyakinan</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($gejala as $gejala)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gejala->nama_gejala }}</td>
                        <td><input type="number" step="0.1" name="cf[]" placeholder="CF User (0-1)" required></td>
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