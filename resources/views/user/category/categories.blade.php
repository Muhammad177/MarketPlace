@extends('user.index.navbar')

@section('container')
<div class="container my-5">
  <h1 class="text-center mb-4">Kategori Produk: {{ $title }}</h1>

  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    @foreach ($categories as $category)
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body text-center">
            <i class="bi bi-tag-fill fs-1 text-primary mb-3"></i>
            <h5 class="card-title fw-bold">{{ $category->name }}</h5>
            <a href="/post?category={{ $category->slug }}" class="stretched-link text-decoration-none text-primary">
              Jelajahi {{ $category->name }}
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
