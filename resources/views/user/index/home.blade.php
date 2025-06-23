@extends('user.index.navbar')

@section('container')

<main class="container my-5" data-aos="fade-up" role="main" aria-label="Perkenalan Produk">
    <header class="mb-4 text-center" data-aos="fade-down" data-aos-delay="100">
        <h1 class="fw-bold">Perkenalan Produk Kami</h1>
    </header>

    <section class="mb-5 text-center" data-aos="fade-up" data-aos-delay="200">
        <p class="fs-5 text-secondary">
            Selamat datang di toko kami! Kami menyediakan berbagai produk berkualitas yang dapat memenuhi kebutuhan Anda sehari-hari.
        </p>
    </section>

    <section class="row g-4" aria-label="Daftar kategori produk">
        <article class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300" role="listitem">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3" aria-hidden="true">
                        <i class="bi bi-phone-fill fs-1 text-primary"></i>
                    </div>
                    <h2 class="card-title fw-bold h5">Elektronik</h2>
                    <p class="card-text text-muted">
                        Smartphone, laptop, kamera, dan aksesoris dengan teknologi terkini dan harga bersaing.
                    </p>
                </div>
            </div>
        </article>

        <article class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400" role="listitem">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3" aria-hidden="true">
                        <i class="bi bi-heart-fill fs-1 text-danger"></i>
                    </div>
                    <h2 class="card-title fw-bold h5">Kecantikan</h2>
                    <p class="card-text text-muted">
                        Produk kecantikan terbaik dari berbagai merek ternama untuk tampil percaya diri setiap hari.
                    </p>
                </div>
            </div>
        </article>

        <article class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="500" role="listitem">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3" aria-hidden="true">
                        <i class="bi bi-house-fill fs-1 text-success"></i>
                    </div>
                    <h2 class="card-title fw-bold h5">Peralatan Rumah Tangga</h2>
                    <p class="card-text text-muted">
                        Peralatan rumah tangga praktis dan modern untuk memudahkan aktivitas Anda.
                    </p>
                </div>
            </div>
        </article>

        <article class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="600" role="listitem">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3" aria-hidden="true">
                        <i class="bi bi-bag-fill fs-1 text-warning"></i>
                    </div>
                    <h2 class="card-title fw-bold h5">Fashion</h2>
                    <p class="card-text text-muted">
                        Koleksi fashion terbaru pria dan wanita dengan desain stylish dan nyaman.
                    </p>
                </div>
            </div>
        </article>
    </section>

    <footer class="mt-5 text-center" data-aos="fade-up" data-aos-delay="500">
        <p class="fs-5">
            Kami berkomitmen memberikan produk berkualitas dan pelayanan ramah untuk pengalaman belanja terbaik Anda.
        </p>
    </footer>
</main>
@endsection
