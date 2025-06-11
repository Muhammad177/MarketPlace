@extends('admin.dashboard.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Post Categories</h1>
  </div>
  <div class="mb-3 mt-3">
    @if (session()->has('success'))
      <h6 class="alert alert-success text-center col-lg-11">{{ session('success') }}</h6>
    @endif
  </div>
  <div class="table-responsive">
    <a class="btn btn-primary mb-3" href="/dashboard/categories/create">Create Categories</a>
    <table class="table table-striped table-sm text-center">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Jumlah Post</th>
          <th scope="col">Slug</th>
          <th scope="col" colspan="3">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->posts->count() }}</td>
            <td>{{ $category->slug }}</td>
            <td>
              <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span
                  data-feather="eye"></span>View</a>
            </td>
            <td>
              <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span
                  data-feather="edit"></span>Edit</a>
            </td>
            <td>

              <button type="button" class="badge bg-danger border-0" data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-url="/dashboard/categories/{{ $category->slug }}">
                <span data-feather="trash-2"></span> Delete
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
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus Category ini?
      </div>
      <div class="modal-footer">
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
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
