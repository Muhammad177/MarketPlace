@extends('admin.dashboard.main')
@section('container')
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">

        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif
        {{-- Tampilkan pesan error umum --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h5 class="mb-0 p-2"><i class="bi bi-person-circle me-2"></i> Edit Profil</h5>
          </div>

          <div class="card-body">
            {{-- FORM UPDATE PROFILE --}}
            <form method="POST" action="{{ route('user.update', $user) }}">
              @csrf
              @method('PUT')

              {{-- Photo --}}
              <div class="mb-3">
                <label class="form-label fw-bold">Foto Profil</label>
                @if ($user->image)
                  <img src="{{ asset('storage/' . $user->image) }}" class="img-fluid mt-3 zoomable-image"
                    alt="{{ $user->name }}" style="cursor:pointer;">
                @else
                  <img src="https://doran.id/wp-content/uploads/2024/02/artikel-komputer.jpg"
                    class="img-fluid mt-3 zoomable-image" alt="{{ $user->name }}" style="cursor:pointer;">
                @endif

                @error('photo')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                name="photo">
              {{-- Nama --}}
              <div class="mb-3">
                <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                  name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Email --}}
              <div class="mb-3">
                <label for="email" class="form-label fw-bold">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                  name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Password Lama --}}
              <div class="mb-3 position-relative">
                <label for="passwordLama" class="form-label fw-bold">Password Lama</label>
                <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" id="passwordLama"
                  name="password_lama" value="{{ old('password_lama') }}" required>

                <span class="position-absolute end-0 me-3" style=" transform: translateY(-150%); cursor: pointer;"
                  onclick="togglePassword(this)" data-target="passwordLama">
                  <i class="bi bi-eye"></i>
                </span>

                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Password Baru --}}
              <div class="mb-3 position-relative">
                <label for="passwordBaru" class="form-label fw-bold">Password Baru</label>
                <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" id="passwordBaru"
                  name="password" value="{{ old('password') }}" required>

                <span class="position-absolute end-0 me-3" style=" transform: translateY(-150%); cursor: pointer;"
                  onclick="togglePassword(this)" data-target="passwordBaru">
                  <i class="bi bi-eye"></i>
                </span>

                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>



              {{-- Tombol Simpan --}}
              <div class="text-end">
                <button type="submit" class="btn btn-success">
                  <i class="bi bi-save"></i> Simpan Perubahan
                </button>
              </div>
            </form>
            {{-- END FORM --}}
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
<script>
  function togglePassword(el) {
    const targetId = el.getAttribute('data-target');
    const passwordInput = document.getElementById(targetId);
    const icon = el.querySelector('i');

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      icon.classList.remove('bi-eye');
      icon.classList.add('bi-eye-slash');
    } else {
      passwordInput.type = 'password';
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    }
  }
</script>
