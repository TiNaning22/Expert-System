@extends('layouts-user.main')
@section('konten')
 <section class="showcase">

        @foreach ($kerusakan as $kerusakan)
            
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <img class="col-lg-6 order-lg-2 text-white showcase-img" src="{{ asset('storage/' . $kerusakan->gambar) }}" height="30" width="130" alt="">
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>{{ $kerusakan->nama_kerusakan }}</h2>
                        <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
                    </div>
                </div>
            </div>
        @endforeach
</section>
        
@endsection