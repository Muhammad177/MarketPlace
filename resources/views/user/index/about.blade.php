@extends('user.index.navbar')

@section('container')
  <main class="py-5 bg-light text-dark">
    <section class="container mb-5" data-aos="fade-up">
      <header class="text-center mb-5" data-aos="fade-down" data-aos-delay="100">
        <h1 class="display-4 fw-bold">Tentang Perusahaan Kami</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
          Kami berkomitmen memberikan solusi terbaik dalam bidang teknologi dan layanan digital.
        </p>
      </header>

      <div class="row g-4">
        <!-- Main Content -->
        <article class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
          <section class="mb-4">
            <h2 class="h3 fw-semibold mb-3">Siapa Kami?</h2>
            <img
              src="https://images.pexels.com/photos/269077/pexels-photo-269077.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
              alt="Team Work" class="img-fluid rounded shadow mb-3"
              style="max-height: 350px; object-fit: cover; width: 100%;">
            <p>
              Kami adalah perusahaan teknologi yang bergerak di bidang pengembangan perangkat lunak, solusi digital, dan
              layanan konsultasi IT. Berdiri sejak 2020, kami telah membantu berbagai sektor industri untuk
              bertransformasi secara digital.
            </p>
          </section>

          <section class="bg-white p-4 rounded shadow-sm" data-aos="fade-up" data-aos-delay="300">
            <h2 class="h4 fw-semibold mb-3">Visi & Misi</h2>
            <div class="row">
              <div class="col-md-6 mb-3">
                <h3 class="h5 fw-bold">Visi</h3>
                <p class="text-muted">
                  Menjadi perusahaan teknologi terpercaya yang mendorong inovasi dan transformasi digital di Indonesia.
                </p>
              </div>
              <div class="col-md-6">
                <h3 class="h5 fw-bold">Misi</h3>
                <ul class="list-unstyled text-muted ps-3">
                  <li>• Mengembangkan solusi digital yang inovatif dan efisien</li>
                  <li>• Memberikan layanan konsultasi berbasis data dan teknologi</li>
                  <li>• Mendorong pertumbuhan bisnis mitra melalui teknologi</li>
                </ul>
              </div>
            </div>
          </section>
        </article>

        <!-- Sidebar -->
        <aside class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
          <div class="bg-white p-4 rounded shadow-sm">
            <h3 class="h5 fw-bold mb-3">Informasi Tambahan</h3>
            <img
              src="https://images.pexels.com/photos/269077/pexels-photo-269077.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
              alt="Achievements" class="img-fluid rounded mb-3"
              style="max-height: 200px; object-fit: cover; width: 100%;">
            <ul class="list-unstyled text-muted small ps-0">
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">🏆</span>
                <strong class="me-1">Penghargaan:</strong> Top 10 IT Solution 2024
              </li>
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">📍</span>
                <strong class="me-1">Lokasi:</strong> Jakarta, Indonesia
              </li>
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">👨‍💼</span>
                <strong class="me-1">Tim:</strong> 50+ Profesional Teknologi
              </li>
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">📞</span>
                <strong class="me-1">Kontak:</strong> info@perusahaan.com
              </li>
            </ul>

            <a href="/contact" class="btn btn-primary w-100 mt-3">Hubungi Kami</a>
          </div>
        </aside>
      </div>
    </section>

    <!-- CTA Section -->
    <footer class="bg-primary text-white py-5" data-aos="zoom-in" data-aos-delay="500">
      <div class="container text-center">
        <h2 class="h2 fw-bold mb-3">Bersama Kami Menuju Masa Depan Digital</h2>
        <p class="lead mb-4">Kami siap menjadi partner teknologi terbaik Anda</p>
        <a href="/contact" class="btn btn-light btn-lg fw-semibold">Hubungi Kami</a>
      </div>
    </footer>
  </main>
@endsection
