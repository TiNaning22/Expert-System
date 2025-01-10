@extends('layouts-user.main')

@section('konten')
<div class="container mt-5">
    <h1 class="mb-5 text-center">Hasil Diagnosa</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Hasil Diagnosa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            @foreach($hasilDiagnosa as $index => $hasil)
                                <div class="mb-3">
                                    <h5>{{ $index + 1 }}. {{ $hasil['kerusakan']->nama_kerusakan }}</h5>
                                    <p>Tingkat Keyakinan: {{ number_format($hasil['cf'] * 100, 2) }}%</p>
                                </div>
                                @if($loop->first)
                                    @php
                                        $gambarKerusakan = $hasil['kerusakan']->gambar ?? 'default.jpg';
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            @if(!empty($hasilDiagnosa) && isset($gambarKerusakan))
                                <img src="{{ asset('storage/' . $gambarKerusakan) }}" alt="Gambar Kerusakan" class="img-fluid rounded">
                            @else
                                <p>Tidak ada gambar tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Solusi dan Saran</h4>
                </div>
                <div class="card-body">
                    @if(!empty($hasilDiagnosa))
                        <p>{{ $hasilDiagnosa[0]['kerusakan']->solusi }}</p>
                    @else
                        <p>Tidak ada solusi yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection