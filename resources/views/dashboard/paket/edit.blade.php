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

              <label for="tenda">Tenda</label>
              @foreach ($tenda as $td)
                <div class="form-group row">
                  <label for="input-tenda-{{ $td->id }}" class="col-sm-9 col-form-label">{{ $td->merek }}</label>
                  <div class="col-sm-3">
                    <input type="number" name="tenda[{{ $td->id }}]" class="form-control"
                      value="{{ $paket->tenda->where('id', $td->id)->first()?->tenda_paket->jumlah ?? 0 }}"
                      id="input-tenda-{{ $td->id }}">
                    @error('tenda.' . $td->id)
                      <div class="text-small text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              @endforeach
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

              <label for="tenda">Barang</label>
              @foreach ($barang as $br)
                <div class="form-group row">
                  <label for="input-barang-{{ $br->id }}"
                    class="col-sm-9 col-form-label">{{ $br->nama }}</label>
                  <div class="col-sm-3">
                    <input type="number" name="barang[{{ $br->id }}]" class="form-control"
                      value="{{ $paket->barang->where('id', $br->id)->first()?->barang_paket->jumlah ?? 0 }}"
                      id="input-barang-{{ $br->id }}">
                    @error('barang.' . $br->id)
                      <div class="text-small text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              @endforeach

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
