@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data tenda</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= route('tenda.store') ?>" method="POST">
          @csrf
          <div class="row">
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
                <label for="tenda">Tenda (Tekan ctrl untuk memilih banyak)</label>
                <select multiple class="form-control" id="tenda" name="tenda[]">
                  @foreach ($tenda as $td)
                    <option value="{{ $td->id }}">{{ $td->merek }}</option>
                  @endforeach
                </select>
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
                <label for="tenda">Barang (Tekan ctrl untuk memilih banyak)</label>
                <select multiple class="form-control" id="tenda" name="tenda[]">
                  @foreach ($barang as $br)
                    <option value="{{ $br->id }}">{{ $br->nama }}</option>
                  @endforeach
                </select>
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
