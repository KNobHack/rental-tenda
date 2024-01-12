@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data Barang</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= route('barang.store') ?>" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Barang</label>
                <input type="text" name="nama" class="form-control">
                @error('nama')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Harga Sewa perhari</label>
                <input type="number" name="harga" class="form-control">
                @error('harga')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Denda perhari</label>
                <input type="number" name="denda" class="form-control">
                @error('denda')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                @error('gambar')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
