@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Input Customer</h1>
    </div>

    <form action="<?= route('customer.update', $customer->id) ?>" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $customer->penyewa->nama }}">
        @error('nama')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" value="{{ $customer->username }}">
        @error('username')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="{{ $customer->penyewa->alamat }}">
        @error('alamat')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Gender</label>
        <select name="gender" id="" class="form-control">
          <option value="laki-laki" {{ $customer->penyewa->gender == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
          <option value="perempuan" {{ $customer->penyewa->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('gender')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">No. Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="{{ $customer->penyewa->no_telepon }}">
        @error('no_telpon')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">No. KTP</label>
        <input type="text" name="no_ktp" class="form-control" value="{{ $customer->penyewa->no_ktp }}">
        @error('no_ktp')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Password (Hanya isi jika ingin di ubah)</label>
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
