@extends('admin.dashboard.main')

@section('container')
<div class="container py-4" style="background: linear-gradient(135deg, #2a2a72, #009ffd); border-radius: 12px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); color: white;">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Judul Post --}}
            <h1 class="mb-4 fw-bold text-center">{{ $post->title }}</h1>

            {{-- Tombol aksi --}}
            <div class="mb-4 d-flex gap-2 flex-wrap">
                <a href="/dashboard/posts" class="btn btn-outline-success d-flex align-items-center">
                    <span data-feather="arrow-left" class="me-1"></span> Back to My Posts
                </a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-outline-warning d-flex align-items-center">
                    <span data-feather="edit" class="me-1"></span> Edit
                </a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger d-flex align-items-center" onclick="return confirm('Are you sure you want to delete this post?')">
                        <span data-feather="trash-2" class="me-1"></span> Delete
                    </button>
                </form>
            </div>

            {{-- Gambar Post --}}
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" 
                     class="img-fluid rounded mb-4 shadow-sm" 
                     alt="{{ $post->category->name }}">
            @else
                <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" 
                     class="img-fluid rounded mb-4 shadow-sm"
                     alt="{{ $post->category->name }}">
            @endif

            {{-- Kategori --}}
            <p class="text-muted mb-2">
                <small>Category: 
                    <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">
                        {{ $post->category->name }}
                    </a>
                </small>
            </p>

            {{-- Konten Post --}}
            <article class="fs-5" style="line-height: 1.8;">
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>

{{-- Feather icons init (pastikan Feather sudah di-include di layout utama) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.feather) {
            feather.replace();
        }
    });
</script>
@endsection
