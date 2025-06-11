@extends('admin.dashboard.main')

@section('container')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
          <h3 class="text-center mb-4">🗂️ Create New Category</h3>

          <form action="/dashboard/categories" method="POST">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">Category Name</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                     placeholder="e.g. Technology, Agriculture..." value="{{ old('name') }}" required autofocus>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control" @error('slug') is-invalid @enderror value="{{ old('slug') }}"
                id="slug" name="slug" readonly required>
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary rounded-3">
                <i class="bi bi-plus-circle"></i> Add Category
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endsection
