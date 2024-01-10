@extends('auth.template')

@section('content')
  <div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

      <div class="card card-primary">
        <div class="card-header">
          <h4>Login</h4>
        </div>

        <div class="card-body">
          <form method="POST" action="<?= route('login') ?>">
            @csrf
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus required>
              @error('username')
                <div class="text-small text-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
              @error('password')
                <div class="text-small text-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
              </button>
            </div>
          </form>

        </div>
      </div>
      <div class="mt-5 text-muted text-center">
        Belum Punya Akun? <a href="<?= url('register') ?>">Buat Akun</a>
      </div>

    </div>
  </div>
@endsection
