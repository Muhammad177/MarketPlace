<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
      @vite('resources/js/app.js')
  </head>

  <body data-page="login">


    <div class="container d-flex">


      <div class="background"></div>
    
<style>
  spline-viewer {
    width: 90vw;
    height: 90vh;
    --spline-scale-mode: contain;
    border-radius: 10px;
    display: block;
  }
</style>

</style>

<script type="module" src="https://unpkg.com/@splinetool/viewer@1.10.24/build/spline-viewer.js"></script>

<spline-viewer url="https://prod.spline.design/K6lHkay1QpB7sAxB/scene.splinecode"></spline-viewer>

      <div class="container d-flex flex-column vh-100">
        <!-- Login Form -->
        <div id="login" class="form-container flex-fill p-3">
          <div class="card">
            <div class="card-header bg-danger text-white text-center">
              <h1>Selamat Datang !!!</h1>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    placeholder="Enter email" vaautofocus required >
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Masuk</button>
              </form>

              @if (session()->has('message'))
                <h6 class="alert alert-success text-center">{{ session('message') }}</h6>
              @endif

              @if (session()->has('loginError'))
                <h6 class="alert alert-danger text-center">{{ session('loginError') }}</h6>
              @endif

              <div class="text-center mt-3">
                <button type="button" id="registerButton" class="btn btn-link">Belum punya akun?</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Registration Form -->
        <div id="register" class="form-container flex-fill p-3 d-none">
          <div class="card">
            <div class="card-header bg-danger text-white text-center">
              <h1>Registrasi !!!</h1>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <form id="registrationForm" method="POST" action="/register">
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
                    id="username" placeholder="username">
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
                  <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" name="password" id="inputPassword" autocomplete="off">
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
              </form>
              <div class="text-center mt-3">
                <button type="button" id="buttonLogin" class="btn btn-link">Sudah punya akun?</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("registerButton").addEventListener("click", function() {
          document.getElementById("login").classList.add("d-none");
          document.getElementById("register").classList.remove("d-none");
        });

        document.getElementById("buttonLogin").addEventListener("click", function() {
          document.getElementById("register").classList.add("d-none");
          document.getElementById("login").classList.remove("d-none");
        });
      });
    </script>

  </body>

</html>
