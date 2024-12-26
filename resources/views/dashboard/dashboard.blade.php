@extends('layouts-dashboard.main')
@section('content')
<div class="container text-center">
    <h1 class="mb-4">Hallo Selamat Datang di Sistem Kepakaran</h1>
    <div class="row justify-content-center">
      <!-- Card Pertama -->
      <div class="col-lg-4 d-flex justify-content-center mb-3">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Kerusakan</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
      </div>
      <!-- Card Kedua -->
      <div class="col-lg-4 d-flex justify-content-center mb-3">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Gejala</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
      </div>
    </div>
</div>

@endsection