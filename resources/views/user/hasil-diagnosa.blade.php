@extends('layouts-user.main')
@section('konten')
<div class="container mt-5">
    <h1 class="mb-5 text-center">Hasil Diagnosa</h1>
    <div class="col justify-content-center">
        <div class="row-lg-4 justify-content-center mb-4" style="border: 1px solid black">
            <h4 class="mb-2">Hasil Diagnosa</h4>
            @foreach($hasilDiagnosa as $index => $hasil)
                <div class="mb-3">
                    <h5>{{ $index + 1 }}. {{ $hasil['kerusakan']->nama_kerusakan }}</h5>
                    <p>Tingkat Keyakinan: {{ number_format($hasil['cf'] * 100, 2) }}%</p>
                </div>
            @endforeach
        </div>
        <div class="row-lg-4 justify-content-center mb-4" style="border: 1px solid black">
            <h4>Solusi dan Saran</h4>
            @if(!empty($hasilDiagnosa))
                <p>{{ $hasilDiagnosa[0]['kerusakan']->solusi }}</p>
            @else
                <p>Tidak ada solusi yang tersedia.</p>
            @endif
        </div>
    </div>
</div
@endsection