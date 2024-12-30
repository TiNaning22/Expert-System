@extends('layouts-dashboard.main')
@section('content')
    <div class="container text center mt-5">
        <div class="row text-center">
            <div class="col-6">
                <table class="table table-hover text-center">
                    <h4 class="text-center">Daftar kerusakan</h4>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kerusakan</th>
                        <th>Gejala</th>
                        <th>MB</th>
                        <th>MD</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($rules as $rules)

                    <tr>
                        <td>{{ $rules->id }}</td>
                        <td>{{$rules->nama_kerusakan}}</td>
                        <td>
                            @foreach (json_decode($rules->gejala_ids) as $gejalaId)
                                {{\App\Models\Gejala::find($gejalaId->nama_kerusakan)}}
                            @endforeach
                        </td>
                        <td>{{ $rules->mb }}</td>
                        <td>{{ $rules->md }}</td>
                    </tr>
                        
                    @endforeach
                      
                </table>
            </div>
        </div>
    </div>
@endsection