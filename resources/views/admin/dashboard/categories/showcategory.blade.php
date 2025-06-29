@extends('admin.dashboard.main')

@section('container')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Header with gradient -->
            <div class="p-4 mb-4 rounded-4 shadow-sm text-center text-white" style="background: linear-gradient(135deg, #ff416c, #ff4b2b);">
                <h1 class="fw-bold mb-2">{{ $category->title }}</h1>
                <p class="mb-0">Manage your category and view related posts</p>
                <div class="mt-3 d-flex justify-content-center flex-wrap gap-2">
                    <a href="/dashboard/categories" class="btn btn-light rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" onsubmit="return confirm('Are you sure?')" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Image -->
            <div class="text-center mb-5">
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid rounded-4 shadow-lg" alt="{{ $category->name }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" class="img-fluid rounded-4 shadow-lg" alt="{{ $category->name }}" style="max-height: 400px; object-fit: cover;">
                @endif
            </div>

            <!-- Posts List -->
            
            <div class="border-top pt-4" data-aos="fade-down" data-aos-delay="400">
                <h3 class="fw-bold text-center text-gradient mb-4" style="background: linear-gradient(135deg, #ff416c, #ff4b2b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    Posts in "{{ $category->name }}"
                </h3>

                @forelse ($posts as $post)
                    <div class="card mb-4 shadow-sm border-gradient card-hover transition">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                #{{ $loop->iteration }} — {{ $post->title }}
                            </h5>
                            <p class="card-text text-muted">
                                {{ Str::limit(strip_tags($post->body), 80, '...') }}
                            </p>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="btn btn-outline-primary rounded-pill px-3 fw-semibold">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-muted">No posts in this category.</p>
                @endforelse

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 1rem;
    }
    .card-hover:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }
    .text-gradient {
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .border-gradient {
        border: 3px solid transparent;
        background-origin: border-box;
        background-clip: content-box, border-box;
        background-image: linear-gradient(#fff, #fff), linear-gradient(135deg, #ff416c, #ff4b2b);
        border-radius: 1rem;
    }
</style>
@endsection
