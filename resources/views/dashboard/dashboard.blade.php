@extends('layouts-dashboard.main')
@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Hallo Selamat Datang di Sistem Kepakaran</h1>
    <div class="row justify-content-center">
      <!-- Card Pertama -->
      @foreach ($kerusakan as $kerusakan)
            <div class="col-lg-4 d-flex justify-content-center mb-3">
              <div class="card" style="width: 18rem; border: none;">
                <div class="card-body">
                  <h2 class="card-title d-flex justify-content-between align-items-center text-center">
                    {{$kerusakan->id}}
                  </h2>
                  <h5 class="card-title d-flex justify-content-between align-items-center">
                    Jumlah Kerusakan
                    <i class="bi bi-wrench-adjustable fa-3x"></i>
                  </h5>
                </div>
              </div>
            </div>
      @endforeach   

      @foreach ($gejala as $gejala)

            <!-- Card Kedua -->
            <div class="col-lg-4 d-flex justify-content-center mb-3">
              <div class="card" style="width: 18rem; border: none;">
                <div class="card-body">
                  <h2 class="card-title d-flex justify-content-between align-items-center text-center">
                    {{$gejala->id}} <i class="bi bi-search fa-1x"></i>
                  </h2>
                  <h4 class="card-title d-flex justify-content-between align-items-center">
                    Jumlah Gejala
                  </h4>
                </div>
              </div>
            </div>
          </div>
      </div>
      @endforeach

@endsection