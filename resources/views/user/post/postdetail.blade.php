@extends('user.index.navbar')

@section('container')
  <main class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <article>
          <header>
            <h1 class="mb-4">{{ $post->title }}</h1>

            <figure>
              @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="{{ $post->category->name }}">
              @else
                <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg" class="img-fluid mt-3"
                  alt="{{ $post->category->name }}">
              @endif
            </figure>

            <p class="text-muted">
              By
              <a href="/post?author={{ $post->author->username }}"
                class="text-decoration-none">{{ $post->author->name }}</a>
              in
              <a href="/post?category={{ $post->category->slug }}"
                class="text-decoration-none">{{ $post->category->name }}</a>
            </p>
          </header>

          <section class="mt-4">
            {!! $post->body !!}
          </section>
        </article>

        <nav class="mt-5 mb-5">
          <a href="{{ url()->previous() }}" class="btn btn-secondary">← Back</a>
        </nav>

        <section class="mt-5" aria-labelledby="komentar-heading">
          <h4 id="komentar-heading" class="mb-4">Komentar</h4>

          <div class="position-relative">
            <div id="comment-list" class="overflow-y-scroll border rounded p-3" style="max-height: 300px;">
              @php
                $comments = $post->comments->sortByDesc('created_at');
                $initialComments = $comments->take(3);
                $remainingComments = $comments->slice(3);
              @endphp

              {{-- Komentar awal --}}
              <div id="initial-comments">
                @foreach ($initialComments as $comment)
                  <article class="comment mb-3 border-bottom pb-2">
                    <header class="d-flex justify-content-between">
                      <strong>{{ $comment->author->name }}</strong>
                      <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </header>
                    <p class="mb-0">{{ $comment->body }}</p>
                  </article>
                @endforeach
              </div>

              {{-- Komentar tambahan, awalnya tersembunyi --}}
              <div id="more-comments" style="display: none;">
                @foreach ($remainingComments as $comment)
                  <article class="comment mb-3 border-bottom pb-2">
                    <header class="d-flex justify-content-between">
                      <strong>{{ $comment->author->name }}</strong>
                      <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </header>
                    <p class="mb-0">{{ $comment->body }}</p>
                  </article>
                @endforeach
              </div>

              @if ($remainingComments->count() > 0)
                <button id="toggle-comments-btn" class="btn btn-link p-0">Tampilkan lainnya</button>
              @endif
            </div>
          </div>

          <script>
            const toggleBtn = document.getElementById('toggle-comments-btn');
            const moreComments = document.getElementById('more-comments');

            toggleBtn?.addEventListener('click', function() {
              if (moreComments.style.display === 'none') {
                moreComments.style.display = 'block';
                toggleBtn.textContent = 'Tampilkan lebih sedikit';
              } else {
                moreComments.style.display = 'none';
                toggleBtn.textContent = 'Tampilkan lainnya';
                // Scroll ke atas agar user tahu balik ke komentar awal
                document.getElementById('comment-list').scrollTop = 0;
              }
            });
          </script>

          {{-- Form Komentar --}}
          <form id="comment-form" class="mt-4" aria-label="Form komentar">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
              <label for="comment">Tinggalkan Komentar:</label>
              <textarea name="body" id="comment" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Kirim Komentar</button>
          </form>
        </section>

      </div>
    </div>
  </main>

  {{-- Script AJAX Komentar --}}
  <script>
  document.getElementById('comment-form').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);
  const initialCommentsDiv = document.getElementById('initial-comments');
  const moreCommentsDiv = document.getElementById('more-comments');
  const toggleBtn = document.getElementById('toggle-comments-btn');

  fetch('/post/coments', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        'Accept': 'application/json'
      },
      body: formData
    })
    .then(res => {
      if (!res.ok) return res.json().then(err => Promise.reject(err));
      return res.json();
    })
    .then(data => {
      // Buat elemen komentar baru
      const commentEl = document.createElement('article');
      commentEl.classList.add('comment', 'mb-3', 'border-bottom', 'pb-2');
      commentEl.innerHTML = `
        <header class="d-flex justify-content-between">
          <strong>${data.author}</strong>
          <small>baru saja</small>
        </header>
        <p class="mb-0">${data.body}</p>
      `;

      // Masukkan komentar baru di awal initialCommentsDiv
      initialCommentsDiv.prepend(commentEl);

      // Batasi jumlah komentar awal (misal maksimal 3)
      const maxInitial = 3;
      const initialComments = initialCommentsDiv.querySelectorAll('article.comment');

      if (initialComments.length > maxInitial) {
        // Pindahkan komentar terakhir di initialComments ke moreComments
        const lastComment = initialComments[initialComments.length - 1];
        moreCommentsDiv.prepend(lastComment);
      }

      // Jika ada komentar di moreComments, pastikan tombol toggle tampil
      if (moreCommentsDiv.children.length > 0 && toggleBtn.style.display === 'none') {
        toggleBtn.style.display = 'inline-block';
      }

      // Reset form
      form.reset();
    })
    .catch(err => {
      if (err.errors) {
        alert(Object.values(err.errors).join('\n'));
      } else {
        alert('Gagal kirim komentar!');
      }
    });
});

  </script>
@endsection
