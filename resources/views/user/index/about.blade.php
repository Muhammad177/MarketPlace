@extends('user.index.navbar')

@section('container')
  <main class="py-5 bg-light text-dark">
    <section class="container mb-5" data-aos="fade-up">
      <header class="text-center mb-5" data-aos="fade-down" data-aos-delay="100">
        <h1 class="display-4 fw-bold">Tentang Digital Marketplace Kami</h1>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
          Platform digital terpercaya yang menghubungkan penjual dan pembeli dengan mudah dan aman.
        </p>
      </header>

      <div class="row g-4">
        <!-- Main Content -->
        <article class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
          <section class="mb-4">
            <h2 class="h3 fw-semibold mb-3">Siapa Kami?</h2>
            <img
              src="https://images.pexels.com/photos/3184339/pexels-photo-3184339.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
              alt="Marketplace Team" class="img-fluid rounded shadow mb-3"
              style="max-height: 350px; object-fit: cover; width: 100%;">
            <p>
              Kami adalah platform digital marketplace yang menyediakan solusi jual beli online untuk berbagai produk seperti elektronik, kecantikan, fashion, dan kebutuhan sehari-hari. Sejak berdiri pada tahun 2020, kami terus berupaya menciptakan ekosistem perdagangan digital yang aman, mudah, dan terpercaya bagi jutaan pengguna.
            </p>
          </section>

          <section class="bg-white p-4 rounded shadow-sm" data-aos="fade-up" data-aos-delay="300">
            <h2 class="h4 fw-semibold mb-3">Visi & Misi</h2>
            <div class="row">
              <div class="col-md-6 mb-3">
                <h3 class="h5 fw-bold">Visi</h3>
                <p class="text-muted">
                  Menjadi digital marketplace terdepan di Indonesia yang memudahkan setiap orang dalam bertransaksi secara online dengan aman dan efisien.
                </p>
              </div>
              <div class="col-md-6">
                <h3 class="h5 fw-bold">Misi</h3>
                <ul class="list-unstyled text-muted ps-3">
                  <li>• Menghubungkan jutaan penjual dan pembeli dalam satu platform yang mudah diakses</li>
                  <li>• Memberikan pengalaman berbelanja online yang aman, cepat, dan nyaman</li>
                  <li>• Mendukung pengembangan usaha mikro, kecil, dan menengah melalui teknologi digital</li>
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
              src="https://images.pexels.com/photos/3184305/pexels-photo-3184305.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
              alt="Marketplace Achievements" class="img-fluid rounded mb-3"
              style="max-height: 200px; object-fit: cover; width: 100%;">
            <ul class="list-unstyled text-muted small ps-0">
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">🏆</span>
                <strong class="me-1">Penghargaan:</strong> Marketplace Terbaik 2024
              </li>
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">📍</span>
                <strong class="me-1">Kantor Pusat:</strong> Jakarta, Indonesia
              </li>
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">👥</span>
                <strong class="me-1">Pengguna Aktif:</strong> 1 Juta+ Pengguna
              </li>
              <li style="display: flex; align-items: center;">
                <span style="min-width: 24px; display: inline-block;">📞</span>
                <strong class="me-1">Kontak:</strong> support@digitalmarketplace.com
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
        <h2 class="h2 fw-bold mb-3">Bergabunglah Bersama Kami</h2>
        <p class="lead mb-4">Jelajahi kemudahan bertransaksi dan jadilah bagian dari revolusi digital marketplace.</p>
        <a href="/register" class="btn btn-light btn-lg fw-semibold">Daftar Sekarang</a>
      </div>
    </footer>
  </main>
@endsection
