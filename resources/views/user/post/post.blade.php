@extends('user.index.navbar')

@section('container')
  <main>
    <header class="mb-5">
      <h1>Pemilik: {{ $title }}</h1>
    </header>

    <section class="search-form mb-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="/post" method="GET">
            @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
              <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search Post" name="search"
                value="{{ request('search') }}">
              <button class="btn btn-danger" type="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    @if ($latestPosts->count())
      <section class="carousel-section mb-3">
        <div id="postCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

          <div class="carousel-inner" style="background-color: rgba(218, 209, 209, 0.6);">
            @foreach ($latestPosts as $index => $post)
              <article class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                @if ($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" class="d-block w-100 img-fluid"
                    style="max-height: 350px; object-fit: cover;" alt="{{ $post->category->name }}">
                @else
                  <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg"
                    class="d-block w-100 img-fluid" style="max-height: 350px; object-fit: contain;" alt="komputer">
                @endif

                <div class="position-absolute top-0 start-0 px-3 py-2 text-white"
                  style="background-color: rgba(0,0,0,0.6);">
                  <a href="/post?category={{ $post->category->slug }}"
                    class="text-white text-decoration-none">{{ $post->category->name }}</a>
                </div>

                <div class="card-body text-center">
                  <h3 class="card-title">Judul: {{ $post->title }}</h3>
                  <h5>Dibuat oleh: <a href="/post?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                  </h5>
                  <p class="card-text">
                    In <a
                      href="/post?category={{ $post->category->slug }}&author={{ $post->author->username }}">{{ $post->category->name }}</a>
                  </p>
                  <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                  <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary mb-3">Read more</a>
                </div>
              </article>
            @endforeach
          </div>
          <div class="d-flex justify-content-center mt-3">
            <div class="carousel-indicators">
              @foreach ($latestPosts as $index => $post)
                <button type="button" data-bs-target="#postCarousel" data-bs-slide-to="{{ $index }}"
                  class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                  aria-label="Slide {{ $index + 1 }}" style="background-color: #6c757d;"></button>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @else
      <p class="h3 text-center font-weight-bold" data-aos="fade-up">Tidak ada post</p>
    @endif

    <section class="posts-grid mt-4">
      <div class="container">
        <div class="row">
          @foreach ($posts as $index => $post)
            <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
              <article class="card h-100">
                <header class="position-absolute top-0 start-0 px-3 py-2 text-white"
                  style="background-color: rgba(0,0,0,0.6);">
                  <a href="/post?category={{ $post->category->slug }}"
                    class="text-decoration-none text-white">{{ $post->category->name }}</a>
                </header>
                @if ($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                    style="height: 200px; object-fit: cover;" alt="{{ $post->category->name }}">
                @else
                  <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" class="img-fluid"
                    style="height: 200px; object-fit: cover;" alt="default image">
                @endif
                <div class="card-body d-flex flex-column"
                  style="background: linear-gradient(135deg, #f0f4f8, #d9e2ec); border-radius: 0.5rem;">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <small class="text-muted">
                    Dibuat oleh: <a href="/post?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                  </small>
                  <div class="card-text mt-2" style="flex-grow: 1; overflow-y: auto; max-height: 100px;">
                    {!! Str::limit(strip_tags($post->body), 150) !!}
                  </div>
                  <p class="card-text mt-2">
                    In <a
                      href="/post?category={{ $post->category->slug }}&author={{ $post->author->username }}">{{ $post->category->name }}</a>
                  </p>
                  <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-outline-primary mt-auto">Read More</a>
                </div>
              </article>
            </div>
          @endforeach
        </div>
        <div class="d-flex justify-content-end">
          {{ $posts->links() }}
        </div>
      </div>
    </section>
  </main>
@endsection
