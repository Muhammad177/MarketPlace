@extends('admin.dashboard.main')

@section('container')
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>
  <h1 class="font-weight-bold mt-3 d-inline-block" style="border-bottom: 3px solid black;">Create Post</h1>



  <div class="row">
    <div class="col-lg-8">
      <form action="{{ route('posts.store') }}" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title') }}" required>
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
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

        {{-- Isi --}}
        <div class="mb-3">
          <label for="body" class="form-label">Isi</label>

          <input id="body" type="hidden" name="body" value="{{ old('body') }}" required>
          @error('body')
            <p class="text-danger">{{ $message }}</p>
          @enderror
          <trix-editor input="body"></trix-editor>

        </div>

        {{-- Kategori --}}
        <div class="mb-3">
          <label for="category_id" class="form-label">Kategori</label>
          <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="" disabled selected>-- Pilih Kategori --</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Post Image File</label>
          <img src="" class="img-preview img-fluid mb-3 col-sm-5" alt="">
          <input class="form-control @error('image') is-invalid @enderror" accept="image/* "type="file" id="image"
            name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    });
    
  function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
    imgPreview.style.display = 'block';
  }
}

  </script>
@endsection
