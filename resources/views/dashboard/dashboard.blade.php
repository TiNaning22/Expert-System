@extends('layouts-dashboard.main')
@section('content')
<div class="container mt-5">
  <h1 class="mb-4 text-center">Hallo Selamat Datang di Sistem Kepakaran</h1>
  <div class="row justify-content-center">
      <!-- Card Pertama -->
      <div class="col-lg-4 d-flex justify-content-center mb-3">
          <div class="card" style="width: 18rem; border: none; background-color: rgb(202, 0, 0); padding:1rem;">
              <div class="card-body position-relative">
                  <h2 class="card-title d-flex justify-content-between align-items-center text-center">
                      {{ $kerusakan->count() }}
                  </h2>
                  <h5 class="card-title">
                      Jumlah Kerusakan
                  </h5>
                  <i class="bi bi-wrench-adjustable position-absolute" style="font-size: 5rem; opacity: 0.5; right: 10px; bottom: 10px;"></i>
              </div>
          </div>
      </div>

      <!-- Card Kedua -->
      <div class="col-lg-4 d-flex justify-content-center mb-3">
          <div class="card" style="width: 18rem; border: none; background-color: green; padding: 1rem;">
              <div class="card-body position-relative" >
                  <h2 class="card-title d-flex justify-content-between align-items-center text-center">
                      {{ $gejala->count() }}
                  </h2>
                  <h4 class="card-title">
                      Jumlah Gejala
                  </h4>
                  <i class="bi bi-search position-absolute" style="font-size: 5rem; opacity: 0.5; right: 10px; bottom: 10px;"></i>
              </div>
          </div>
      </div>

      <div class="col-lg-4 d-flex justify-content-center mb-3">
        <div class="card" style="width: 18rem; border: none; background-color: rgb(218, 214, 22); padding: 1rem;">
            <div class="card-body position-relative" >
                <h2 class="card-title d-flex justify-content-between align-items-center text-center">
                    {{ $rules->count() }}
                </h2>
                <h4 class="card-title">
                    Jumlah Gejala
                </h4>
                <i class="bi bi-search position-absolute" style="font-size: 5rem; opacity: 0.5; right: 10px; bottom: 10px;"></i>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection