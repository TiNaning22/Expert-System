@extends('layouts-dashboard.main')
@section('content')
    <div class="container text center mt-5">
        <div class="row text-center">
            <div class="col-6">
                <table class="table table-hover text-center">
                    <h4 class="text-center">Daftar kerusakan</h4>
                    <tr>
                        <th>Kode Kerusakan</th>
                        <th>Nama Kerusakan</th>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>afafa</td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <table class="table table-hover text-center">
                    <h4 class="text-center">Daftar Gejala</h4>
                    <tr>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Nilai MB</th>
                        <th>Check</th>
                    </tr>
                    <tr>
                        <td>01</td>
                        <td>aff</td>
                        <td>2</td>
                        <td><input type="checkbox" name="nama_kerusakan" id="nama_kerusakan"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection