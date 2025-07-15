@extends('user.index.navbar')

@section('title', 'Daftar Barang')
@section('page', 'indexshop')

@section('container')
  <div class="container py-4">
    <h2 class="mb-4 fw-bold">Daftar Barang</h2>

    <div class="row">
      @forelse ($shops as $index => $shop)
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
          <div class="card h-100 shadow rounded-4 overflow-hidden shop-card">
            @if ($shop->image)
              <img src="{{ asset('storage/' . $shop->image) }}" class="card-img-top" alt="{{ $shop->nama_barang }}"
                style="object-fit: cover; height: 200px;">
            @else
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3TILjMuJo_fnwn3DZ0YPthVKUOkgAiMJGWg&s"
                class="card-img-top " alt="Default Image" style="object-fit: contain; height: 200px;">
            @endif
            <div class="card-body d-flex flex-column">
              <h5 class="card-title fw-bold">{{ $shop->nama_barang }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Kategori: {{ $shop->category?->name ?? 'Tidak ada kategori' }}
              </h6>
              <p class="card-text flex-grow-1 overflow-auto" style="max-height: 100px;">
                {!! Str::limit(strip_tags($shop->deskripsi_barang), 150) !!}
              </p>

              <p class="card-text mb-1"><strong>Jumlah:</strong> {{ $shop->jumlah_barang }}</p>
              <p class="card-text mb-3"><strong>Harga:</strong> Rp {{ number_format($shop->harga_barang, 0, ',', '.') }}
              </p>
              <div class="d-flex gap-2 w-100">
                <a href="{{ route('shop.show', $shop) }}"
                  class="btn btn-primary rounded-pill fw-semibold flex-grow-1 text-center">
                  Beli Barang
                </a>
                <form action="{{ route('shop.store', $shop) }}" method="POST" class="flex-grow-1">
                  @csrf
                  <button type="submit"
                    class="btn btn-outline-success rounded-pill fw-semibold w-100 d-flex justify-content-center align-items-center">
                    <i class="bi bi-cart-plus me-1"></i> +
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p class="text-muted">Tidak ada barang yang tersedia.</p>
      @endforelse
    </div>
    <div class="d-flex justify-content-end mt-4">
      {{ $shops->links() }}

    </div>
  </div>
@endsection
