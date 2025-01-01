@extends('layouts-dashboard.main')
@section('content')
<div class="container">
    <h1>Daftar Rules</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kerusakan</th>
                <th>Gejala</th>
                <th>MB</th>
                <th>MD</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rules as $rule)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $rule->kerusakan->nama_kerusakan }}</td>
                <td>
                    @php
                        $gejalaIds = json_decode($rule->gejala_ids, true);
                    @endphp
                    @foreach ($gejalaIds as $gejalaId)
                        <span class="badge bg-primary">{{ $gejalaId }}</span>
                    @endforeach
                </td>
                <td>{{ $rule->mb }}</td>
                <td>{{ $rule->md }}</td>
                <td>
                    <a href="{{ route('rules.edit', $rule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('rules.destroy', $rule->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data rules</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="rules/create"><button class="btn btn-primary" id="btnNavbarSearch" type="button">Tambah Data</button></a>
</div>
@endsection