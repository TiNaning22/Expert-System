@extends('layouts-user.main')
@section('konten')
<header class="masthead">
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="text-center text-white">
                    <!-- Page heading-->
                    <h1 class="mb-5">Deteksi Kerusakan Motor Anda Dengan Mudah dan Cepat!</h1>
                    <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row">
                            <a href="/diagnosa" class="btn btn-primary">Diagnosa Sekarang</a>
                        </div>
                        <div class="d-none" id="submitSuccessMessage">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection