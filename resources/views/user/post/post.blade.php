@extends('user.index.navbar')
@section('title', 'Post')
@section('page', 'post')

@section('container')
<main class="pb-5">
  <header class="mb-5 text-center">
    <h1 class="display-4 fw-bold">Pemilik: {{ $title }}</h1>
  </header>

  <section class="search-form mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="/post" method="GET" class="input-group shadow-sm rounded">
          @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <input type="text" class="form-control border-0" placeholder="Search Post" name="search"
            value="{{ request('search') }}" aria-label="Search posts">
          <button class="btn btn-danger fw-semibold px-4" type="submit">Search</button>
        </form>
      </div>
    </div>
  </section>

  @if ($latestPosts->count())
  <section class="carousel-section mb-5 position-relative">
    <div id="postCarousel" class="carousel slide rounded shadow" data-bs-ride="carousel" data-bs-interval="3500" style="overflow: hidden;">
      <div class="carousel-inner">
        @foreach ($latestPosts as $index => $post)
          <article class="carousel-item {{ $index == 0 ? 'active' : '' }} position-relative">
            @if ($post->image)
              <img src="{{ asset('storage/' . $post->image) }}" class="d-block w-100" style="max-height: 350px; object-fit: cover;" alt="{{ $post->category->name }}">
            @else
              <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg"
                class="d-block w-100" style="max-height: 350px; object-fit: contain;" alt="komputer">
            @endif

            <!-- Overlay gradient -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.7));"></div>

            <div class="position-absolute top-0 start-0 px-3 py-2 text-white fw-semibold"
              style="background-color: rgba(0,0,0,0.7); border-bottom-right-radius: 0.5rem;">
              <a href="/post?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
            </div>

            <div class="carousel-caption d-none d-md-block text-start">
              <h3 class="card-title fs-3 fw-bold text-shadow">{{ $post->title }}</h3>
              <h6>Dibuat oleh: <a href="/post?author={{ $post->author->username }}" class="text-light text-decoration-underline">{{ $post->author->name }}</a></h6>
              <p>In <a href="/post?category={{ $post->category->slug }}&author={{ $post->author->username }}" class="text-light text-decoration-underline">{{ $post->category->name }}</a></p>
              <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small><br>
              <a href="{{ route('post.show', $post->slug) }}" class="btn btn-primary mt-3 shadow-sm">Read more</a>
            </div>
          </article>
        @endforeach
      </div>

      <!-- Carousel indicators -->
      <div class="carousel-indicators mt-3">
        @foreach ($latestPosts as $index => $post)
          <button type="button" data-bs-target="#postCarousel" data-bs-slide-to="{{ $index }}"
            class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $index + 1 }}" style="background-color: #6c757d; width:12px; height:12px; border-radius:50%; margin:0 6px;"></button>
        @endforeach
      </div>
    </div>
  </section>
  @else
    <p class="h3 text-center fw-bold text-muted" data-aos="fade-up">Tidak ada post</p>
  @endif

  <section class="posts-grid mt-4">
    <div class="container">
      <div class="row g-4">
        @foreach ($posts as $index => $post)
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            <article class="card h-100 shadow-sm rounded border-0 hover-shadow transition">
              <header class="position-absolute top-0 start-0 px-3 py-2 text-white rounded-bottom-end"
                style="background-color: rgba(0,0,0,0.7); z-index: 10;">
                <a href="/post?category={{ $post->category->slug }}" class="text-decoration-none text-white fw-semibold">
                  {{ $post->category->name }}
                </a>
              </header>
              @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-top"
                  style="height: 200px; object-fit: cover;" alt="{{ $post->category->name }}">
              @else
                <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" class="img-fluid rounded-top"
                  style="height: 200px; object-fit: cover;" alt="default image">
              @endif
              <div class="card-body d-flex flex-column" style="background: linear-gradient(135deg, #476b8f, #d9e2ec , #476b8f); border-radius: 0 0 0.5rem 0.5rem;">
                <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                <small class="text-muted mb-2">
                  Dibuat oleh: <a href="/post?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                </small>
                <div class="card-text mt-2" style="flex-grow: 1; overflow-y: auto; max-height: 100px;">
                  {!! Str::limit(strip_tags($post->body), 150) !!}
                </div>
                <p class="card-text mt-2 mb-3">
                  In <a href="/post?category={{ $post->category->slug }}&author={{ $post->author->username }}" class="text-decoration-none">{{ $post->category->name }}</a>
                </p>
                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-outline-primary mt-auto fw-semibold shadow-sm transition">Read More</a>
              </div>
            </article>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-end mt-4">
        {{ $posts->links() }}
      </div>
    </div>
  </section>
</main>


@endsection
