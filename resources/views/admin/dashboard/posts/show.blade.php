@extends('admin.dashboard.main')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my
                    posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('DELETE')    
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="trash-2"></span>Delete</button>
                    
                </form>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" 
                     class="img-fluid mt-3" 
                     alt="{{ $post->category->name }}">
              @else
                <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" 
                     class="img-fluid mt-3"
                     alt="{{ $post->category->name }}">
              @endif
                <article class="my-3 fs-5">
                    
                    <body>
                        {!! $post->body !!}
                    </body>
                </article>
                
            </div>
    </div>

@endsection
