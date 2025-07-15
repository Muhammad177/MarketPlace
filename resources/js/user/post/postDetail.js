export function initPostDetail() {
  // Zoomable Image Modal
  document.querySelectorAll('.zoomable-image, .zoomable-image-profile').forEach(img => {
    img.style.cursor = 'pointer';

    img.addEventListener('click', function() {
      const modalImg = document.getElementById('modalImage');
      modalImg.src = this.src;
      const myModal = new bootstrap.Modal(document.getElementById('imageModal'));
      myModal.show();
    });
  });

  // AJAX Submit Comment Form
  const commentForm = document.getElementById('comment-form');
  if (commentForm) {
    commentForm.addEventListener('submit', function(e) {
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
          const commentEl = document.createElement('article');
          commentEl.classList.add('comment', 'mb-3', 'border-bottom', 'pb-2');
          commentEl.innerHTML = `
            <header class="d-flex justify-content-between">
              <strong>${data.author}</strong>
              <small>baru saja</small>
            </header>
            <p class="mb-0">${data.body}</p>
          `;
          commentList.prepend(commentEl);
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
  }

  // Toggle More Comments Button
  const toggleBtn = document.getElementById('toggle-comments-btn');
  const moreComments = document.getElementById('more-comments');

  if (toggleBtn && moreComments) {
    toggleBtn.addEventListener('click', function() {
      if (moreComments.style.display === 'none') {
        moreComments.style.display = 'block';
        toggleBtn.textContent = 'Tampilkan lebih sedikit';
      } else {
        moreComments.style.display = 'none';
        toggleBtn.textContent = 'Tampilkan lainnya';
        document.getElementById('comment-list').scrollTop = 0;
      }
    });
  }
}
