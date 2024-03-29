@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Input Customer</h1>
    </div>

    <form action="<?= route('customer.store') ?>" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control">
        @error('nama')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control">
        @error('username')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" name="alamat" class="form-control">
        @error('alamat')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Gender</label>
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
      <div class="form-group">
        <label for="">No. Telepon</label>
        <input type="text" name="no_telepon" class="form-control">
        @error('no_telpon')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">No. KTP</label>
        <input type="text" name="no_ktp" class="form-control">
        @error('no_ktp')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control">
        @error('password')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="">Ulangi Password</label>
        <input type="password" name="password_confirmation" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>


  </section>
@endsection
