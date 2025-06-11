@extends('admin.dashboard.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $category->title }}</h1>

                <a href="/dashboard/categories" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my category</a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

                <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                        <span data-feather="trash-2"></span> Delete
                    </button>
                </form>

                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid mt-3" alt="{{ $category->name }}">
                @else
                    <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" class="img-fluid mt-3" alt="{{ $category->name }}">
                @endif

                <article class="my-4">
                    <div class="mb-3 text-center border rounded shadow-sm">
                        <h1>Posts in this Category: {{ $category->name }}</h1>
                    </div>
                        
                    @forelse ($posts as $post)
                    Number {{ $loop->iteration }}   
                    <div class="mb-3 p-3 border rounded shadow-sm">
                        <h5>{{ $post->title }}</h5>
                        <p>{{ Str::limit(strip_tags($post->body), 50, '...') }}</p>
                        <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span>View</a>
                    </div>
                @empty
                    <p>No posts in this category.</p>
                @endforelse
                
                <!-- Paginate -->
                <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
                
                </article>

            </div>
        </div>
    </div>
@endsection
