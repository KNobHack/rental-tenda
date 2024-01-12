@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data tenda</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= route('tenda.store') ?>" enctype="multipart/form-data" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tipe tenda</label>
                <select name="kode_tipe" id="" class="form-control">
                  <option value="">--Pilih Tipe tenda--</option>
                  @foreach ($tipe as $tp)
                    <option value="<?= $tp->kode ?>"><?= $tp->nama ?></option>
                  @endforeach
                </select>
                @error('kode_tipe')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Merek</label>
                <input type="text" name="merek" class="form-control">
                @error('merek')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">kapasitas</label>
                <input type="text" name="kapasitas" class="form-control">
                @error('kapasitas')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Warna</label>
                <input type="text" name="warna" class="form-control">
                @error('warna')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Harga Sewa perhari</label>
                <input type="number" name="harga" class="form-control">
                @error('harga')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Denda</label>
                <input type="number" name="denda" class="form-control">
                @error('denda')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option value="">--Pilih Status--</option>
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
                @error('status')
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
