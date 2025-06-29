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
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3 zoomable-image"
                  alt="{{ $post->category->name }}" style="cursor:pointer;">
              @else
                <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg"
                  class="img-fluid mt-3 zoomable-image" alt="{{ $post->category->name }}" style="cursor:pointer;">
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
                  <article class="comment mb-3 border-bottom pb-2"
                    style="border-width: 3px !important; border-style: solid;">
                    <header class="d-flex justify-content-between align-items-center">
                      <div class="d-flex align-items-center gap-2 mt-3">
                        <img
                          src="{{ $comment->author->profile_photo_url ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH9nZ4hFrKP4Az1ISx3-1N24TyCdvSAlNZzQ&s' }}"
                          alt="Foto Profil {{ $comment->author->name }}"
                          style="width: 40px; height: 40px; border-radius: 50%; object-fit: contain; flex-shrink: 0; cursor:pointer;"
                          class="zoomable-image-profile">
                        <strong class="mb-0">{{ $comment->author->name }}</strong>
                      </div>
                      <small class="text-muted p-3">{{ $comment->created_at->diffForHumans() }}</small>
                    </header>
                    <p class="mb-0 mt-2 p-3">{{ $comment->body }}</p>
                  </article>
                @endforeach
              </div>



              {{-- Komentar tambahan, awalnya tersembunyi --}}
              <div id="more-comments" style="display: none;">
                @foreach ($remainingComments as $comment)
                  <article class="comment mb-3 border-bottom pb-2"
                    style="border-width: 3px !important; border-style: solid;">
                    <header class="d-flex justify-content-between">
                     <div class="d-flex align-items-center gap-2 mt-3">
                        <img
                          src="{{ $comment->author->profile_photo_url ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH9nZ4hFrKP4Az1ISx3-1N24TyCdvSAlNZzQ&s' }}"
                          alt="Foto Profil {{ $comment->author->name }}"
                          style="width: 40px; height: 40px; border-radius: 50%; object-fit: contain; flex-shrink: 0; cursor:pointer;"
                          class="zoomable-image-profile">
                        <strong class="mb-0">{{ $comment->author->name }}</strong>
                      </div>
                      <small class="text-muted p-3">{{ $comment->created_at->diffForHumans() }}</small>
                    </header>
                    <p class="mb-0 p-3">{{ $comment->body }}</p>
                  </article>
                @endforeach
              </div>

              @if ($remainingComments->count() > 0)
                <button id="toggle-comments-btn" class="btn btn-link p-0">Tampilkan lainnya</button>
              @endif
            </div>
          </div>

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
    <!-- Modal -->
      <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body p-0 d-flex justify-content-center align-items-center" style="background-color: rgba(0,0,0,0.7);">
        <img
          src=""
          id="modalImage"
          class="img-fluid"
          alt="Zoomed Image"
          style="max-height: 90vh; object-fit: contain; background-color: #fff; padding: 10px; border-radius: 10px;"
        >
      </div>
    </div>
  </div>
</div>

  {{-- Script AJAX Komentar --}}
  <script>
    document.querySelectorAll('.zoomable-image, .zoomable-image-profile').forEach(img => {
      img.style.cursor = 'pointer'; // pastikan cursor pointer

      img.addEventListener('click', function() {
        const modalImg = document.getElementById('modalImage');
        modalImg.src = this.src;
        var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
        myModal.show();
      });
    });


    document.getElementById('comment-form').addEventListener('submit', function(e) {
      e.preventDefault();

      const form = e.target;
      const formData = new FormData(form);
      const commentList = document.getElementById('comment-list');

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

          // Tambahkan komentar baru ke atas
          commentList.prepend(commentEl);

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
@endsection
