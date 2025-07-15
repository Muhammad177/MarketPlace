@extends('admin.dashboard.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2 fw-bold">My Posts — {{ auth()->user()->name }}</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success text-center col-lg-11">
    {{ session('success') }}
  </div>
@endif

<div class="table-responsive col-lg-11 shadow rounded-4 p-3 bg-white">
  <a class="btn btn-primary mb-3 rounded-pill px-4 fw-semibold shadow-sm" href="/dashboard/posts/create">
    <i class="bi bi-plus-circle me-1"></i> Create Post
  </a>
  <table class="table table-hover align-middle text-center border rounded-4 overflow-hidden">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tema</th>
        <th scope="col">Judul</th>
        <th scope="col">Author</th>
        <th scope="col">Created</th>
        <th scope="col" colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($post as $posts)
      <tr class="table-row-hover">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $posts->category->slug }}</td>
        <td class="fw-semibold">{{ $posts->title }}</td>
        <td>{{ $posts->author->username }}</td>
        <td>{{ $posts->created_at->format('d M Y') }}</td>
        <td>
          <a href="/dashboard/posts/{{ $posts->slug }}" class="btn btn-outline-info btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-eye"></i> View
          </a>
        </td>
        <td>
          <a href="/dashboard/posts/{{ $posts->slug }}/edit" class="btn btn-outline-warning btn-sm rounded-pill px-3 fw-semibold">
            <i class="bi bi-pencil-square"></i> Edit
          </a>
        </td>
        <td>
          <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#deleteModal" data-url="/dashboard/posts/{{ $posts->slug }}">
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
   <div class="modal-body text-dark">
  Apakah kamu yakin ingin menghapus post ini?
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

@endsection
