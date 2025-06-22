@extends('user.index.navbar')

@section('container')
<div class="container my-5" data-aos="fade-up">
    <h1 class="mb-4 text-center fw-bold" data-aos="fade-down" data-aos-delay="100">Perkenalan Produk Kami</h1>
    <p class="text-center mb-5 fs-5 text-secondary" data-aos="fade-up" data-aos-delay="200">
        Selamat datang di toko kami! Kami menyediakan berbagai produk berkualitas yang dapat memenuhi kebutuhan Anda sehari-hari.
    </p>

    <div class="row g-4">
        <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-phone-fill fs-1 text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold">Elektronik</h5>
                    <p class="card-text text-muted">
                        Smartphone, laptop, kamera, dan aksesoris dengan teknologi terkini dan harga bersaing.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-heart-fill fs-1 text-danger"></i>
                    </div>
                    <h5 class="card-title fw-bold">Kecantikan</h5>
                    <p class="card-text text-muted">
                        Produk kecantikan terbaik dari berbagai merek ternama untuk tampil percaya diri setiap hari.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-house-fill fs-1 text-success"></i>
                    </div>
                    <h5 class="card-title fw-bold">Peralatan Rumah Tangga</h5>
                    <p class="card-text text-muted">
                        Peralatan rumah tangga praktis dan modern untuk memudahkan aktivitas Anda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="600">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-bag-fill fs-1 text-warning"></i>
                    </div>
                    <h5 class="card-title fw-bold">Fashion</h5>
                    <p class="card-text text-muted">
                        Koleksi fashion terbaru pria dan wanita dengan desain stylish dan nyaman.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center" data-aos="fade-up" data-aos-delay="700">
        <p class="fs-5">
            Kami berkomitmen memberikan produk berkualitas dan pelayanan ramah untuk pengalaman belanja terbaik Anda.
        </p>
    </div>
</div>
@endsection
