<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Registrasi</title>
    <link rel="icon" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <div class="container d-flex justify-content-center">
      <div class="card col-lg-6">
        <div class="card-header bg-danger text-white text-center">
          <h1>Silahkan Registrasi</h1>
        </div>
        <div class="card-body">
          <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                id="name" placeholder="Masukkan Nama" value="{{ old('name') }}" autofocus>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">Username</label>
              <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                id="username" placeholder="username" value="{{ old('username') }}">
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="inputEmail" class="form-label">Alamat Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                name="password" id="inputPassword" autocomplete="off">
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="Konfirmasi Password" name="password_confirmation" id="password_confirmation" required
                autocomplete="off">
              @error('password_confirmation')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Registrasi</button>
            </div>

            <div class="d-flex justify-content-center mt-3">
              <a href="/login" class="btn btn-link text-align-center">Sudah punya akun?</a>
            </div>
          </form>
        </div>
      </div>
    </div>


  </body>

</html>
