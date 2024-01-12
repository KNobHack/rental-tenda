@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Input Tipe Tenda</h1>
    </div>

    <form action="<?= route('tipe_tenda.store') ?>" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Kode Tipe</label>
        <input type="text" name="kode" class="form-control">
        @error('kode')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="">Nama Tipe</label>
        <input type="text" name="nama" class="form-control">
        @error('nama')
          <div class="text-small text-danger">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>

  </section>
@endsection
