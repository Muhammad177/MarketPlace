@extends('user.index.navbar')
@section('title', 'Detail Produk - ' . $shop->nama_barang)


@section('page', 'showshop')

@section('container')

<div class="container py-4">
  <div class="row">
    <div class="col-md-6 d-flex justify-content-center align-items-center" data-aos="fade-right" style="height: 400px;">
      @if ($shop->image)
        <img src="{{ asset('storage/' . $shop->image) }}" alt="{{ $shop->nama_barang }}"
             class="img-fluid rounded-4 shadow"
             style="object-fit: contain; max-height: 100%; max-width: 100%;">
      @else
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3TILjMuJo_fnwn3DZ0YPthVKUOkgAiMJGWg&s"
             alt="Default Image"
             class="img-fluid rounded-4 shadow"
             style="object-fit: contain; max-height: 100%; max-width: 100%;">
      @endif
    </div>

    <div class="col-md-6" data-aos="fade-left">
      <h2 class="fw-bold">{{ $shop->nama_barang }}</h2>
      <h6 class="text-muted mb-2">Kategori: {{ $shop->category?->name ?? 'Tidak ada kategori' }}</h6>
      <p>{!! $shop->deskripsi_barang !!}</p>

      <p><strong>Jumlah tersedia:</strong> {{ $shop->jumlah_barang }}</p>
      <p><strong>Harga:</strong> Rp {{ number_format($shop->harga_barang, 0, ',', '.') }}</p>

      <form id="beliForm" action="{{ route('shop.store', $shop) }}" method="POST" class="mt-4"
            data-harga-satuan="{{ $shop->harga_barang }}"
            data-nama-barang="{{ $shop->nama_barang }}"
            data-nama-pembeli="{{ auth()->user()->name ?? 'Guest' }}"
            data-stok="{{ $shop->jumlah_barang }}">
        @csrf
        <div class="mb-3">
          <label for="jumlah_beli" class="form-label fw-semibold">Jumlah yang ingin dibeli</label>
          <div class="input-group" style="max-width: 200px;">
            <button class="btn btn-outline-secondary" id="minusBtn" type="button">−</button>
            <input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control text-center" min="1" max="{{ $shop->jumlah_barang }}" value="1" required>
            <button class="btn btn-outline-secondary" id="plusBtn" type="button">+</button>
          </div>
        </div>
        <button type="submit" class="btn btn-success rounded-pill fw-semibold">Beli Sekarang</button>
      </form>
    </div>
  </div>

  <div class="mt-4">
    <a href="{{ route('shop.index') }}" class="btn btn-secondary rounded-pill">← Kembali ke Daftar Barang</a>
  </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pembelian (Nota)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body" id="notaBody">
        <!-- Nota akan muncul di sini -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success rounded-pill" id="confirmButton">Ya, Beli</button>
      </div>
    </div>
  </div>
</div>


@endsection
