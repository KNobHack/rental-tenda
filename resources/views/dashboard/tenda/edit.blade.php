@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Tenda</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= route('tenda.update', $tenda->id) ?>" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tipe tenda</label>
                <select name="kode_tipe" id="" class="form-control">
                  <option value="<?= $tenda->tipe->kode ?>"><?= $tenda->tipe->nama ?></option>
                  <?php foreach($tipe as $tp): ?>
                  <option value="<?= $tp->kode ?>"><?= $tp->nama ?></option>
                  <?php endforeach; ?>
                </select>
                @error('kode_tipe')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Merek</label>
                <input type="text" name="merek" class="form-control" value="<?= $tenda->merek ?>">
                @error('merek')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">kapasitas</label>
                <input type="text" name="kapasitas" class="form-control" value="<?= $tenda->kapasitas ?>">
                @error('kapasitas')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Warna</label>
                <input type="text" name="warna" class="form-control" value="<?= $tenda->warna ?>">
                @error('warna')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label for="">Harga</label>
                <input type="number" name="harga" class="form-control" value="<?= $tenda->harga ?>">
                @error('harga')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="">Denda</label>
                <input type="number" name="denda" class="form-control" value="<?= $tenda->denda ?>">
                @error('denda')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option @if ($tenda->tersedia == '1') selected="selected" @endif value="1">Tersedia</option>
                  <option @if ($tenda->tersedia == '0') selected="selected" @endif value="0">Tidak Tersedia
                  </option>
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
