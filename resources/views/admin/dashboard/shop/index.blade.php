@extends('admin.dashboard.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2 fw-bold">My Shop — {{ auth()->user()->name }}</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success text-center col-lg-11">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-11 shadow rounded-4 p-3 bg-white">
  <a class="btn btn-primary mb-3 rounded-pill px-4 fw-semibold shadow-sm" href="/dashboard/shop/create">
    <i class="bi bi-plus-circle me-1"></i> Create Shop
  </a>
  <table class="table table-hover align-middle text-center border rounded-4 overflow-hidden">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Harga</th>
        <th scope="col">Kode</th>
        <th scope="col">User</th>
        <th scope="col">Created</th>
        <th scope="col" colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($shops as $shop)
      <tr class="table-row-hover">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $shop->category->name ?? '-' }}</td>
        <td class="fw-semibold">{{ $shop->nama_barang }}</td>
        <td>{{ $shop->jumlah_barang }}</td>
        <td>Rp {{ number_format($shop->harga_barang, 0, ',', '.') }}</td>
        <td>{{ $shop->code_barang }}</td>
        <td>{{ $shop->user->name ?? '-' }}</td>
        <td>{{ $shop->created_at->format('d M Y') }}</td>
        <td>
          <a href="/dashboard/shops/{{ $shop->code_barang }}" class="btn btn-outline-info btn-sm rounded-pill px-3 fw-semibold">
  <i class="bi bi-eye"></i> View
</a>

        </td>
        <td>
          <a href="/dashboard/shop/{{ $shop->code_barang }}/edit" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
        </td>
        <td>
          <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="/dashboard/shop/{{ $shop->id }}">
            <i class="bi bi-trash"></i> Delete
          </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg rounded-4">
      <div class="modal-header bg-danger text-white rounded-top-4">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus barang ini?
      </div>
      <div class="modal-footer">
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger rounded-pill px-3">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script Modal -->
<script>
  const deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const url = button.getAttribute('data-url');
    const form = document.getElementById('deleteForm');
    form.action = url;
  });
</script>

<style>
  .table-row-hover:hover {
    background: rgba(0, 0, 0, 0.05);
  }
</style>
@endsection
