@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Edit Data Paket</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= route('paket.update', $paket->id) ?>" enctype="multipart/form-data" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama paket</label>
                <input type="text" name="nama" class="form-control" value="{{ $paket->nama }}">
                @error('nama')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Harga Sewa perhari</label>
                <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}">
                @error('harga')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="tenda">Tenda (Tekan ctrl untuk memilih banyak)</label>
                <select multiple class="form-control" id="tenda" name="tenda[]">
                  @foreach ($tenda as $td)
                    <option value="{{ $td->id }}" {{ $paket->tenda->contains($td) ? 'selected' : '' }}>
                      {{ $td->merek }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Denda perhari</label>
                <input type="number" name="denda" class="form-control" value={{ $paket->denda }}>
                @error('denda')
                  <div class="text-small text-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="barang">Barang (Tekan ctrl untuk memilih banyak)</label>
                <select multiple class="form-control" id="barang" name="barang[]">
                  @foreach ($barang as $br)
                    <option value="{{ $br->id }}" {{ $paket->barang->contains($br) ? 'selected' : '' }}>
                      {{ $br->nama }}</option>
                  @endforeach
                </select>
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
