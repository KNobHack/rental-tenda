@extends('auth.template')

@section('content')
  <div class="row">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

      <div class="card card-primary">
        <div class="card-header">
          <h4>Register</h4>
        </div>

        <div class="card-body">
          <form method="POST" action="<?= route('register') ?>">
            @csrf
            <div class="row">
              <div class="form-group col-6">
                <label for="nama">Nama</label>
                <input id="nama" type="text" class="form-control" name="nama" autofocus
                  value="{{ old('nama') }}">
                @error('nama')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group col-6">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
                @error('username')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
              @error('alamat')
                <div class="text-small text-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="row">
              <div class="form-group col-12">
                <label for="gender" class="d-block">Gender</label>
                <select name="gender" id="" class="form-control">
                  <option value="">--Pilih Gender--</option>
                  <option value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
                @error('gender')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="form-group col-6">
                <label for="no_telepon" class="d-block">No. Telepon</label>
                <input id="no_telepon" type="text" class="form-control" name="no_telepon"
                  value="{{ old('no_telepon') }}">
                @error('no_telepon')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group col-6">
                <label>No. KTP</label>
                <input type="text" name="no_ktp" class="form-control" value="{{ old('no_ktp') }}">
                @error('no_ktp')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>

            <div class="row">
              <div class="form-group col-6">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group col-6">
                <label>Ulangi Password</label>
                <input type="password" name="password_confirmation" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Register
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
