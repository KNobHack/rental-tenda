@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Detail tenda</h1>
    </div>
  </section>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <img width="110%;" src="<?= url('assets/upload/' . $tenda->gambar) ?>" alt="">
        </div>
        <div class="col-md-7">
          <table class="table">
            <tr>
              <td>Tipe tenda</td>
              <td>{{ $tenda->tipe->nama }}</td>
            </tr>
            <tr>
              <td>Merek</td>
              <td><?= $tenda->merek ?></td>
            </tr>
            <tr>
              <td>kapasitas</td>
              <td><?= $tenda->kapasitas ?></td>
            </tr>
            <tr>
              <td>Warna</td>
              <td><?= $tenda->warna ?></td>
            </tr>
            <tr>
              <td>Harga Sewa</td>
              <td>Rp. <?= number_format($tenda->harga, 0, ',', '.') ?>,-</td>
            </tr>
            <tr>
              <td>Denda</td>
              <td>Rp. <?= number_format($tenda->denda, 0, ',', '.') ?>,-</td>
            </tr>
            <tr>
              <td>Status</td>
              <td>
                @if ($tenda->tersedia == 0)
                  <span class="badge badge-danger">Tidak Tersedia</span>
                @else
                  <span class="badge badge-primary">Tersedia</span>
                @endif
              </td>
            </tr>
          </table>

          <a href="<?= route('tenda.index') ?>" class="btn btn-sm btn-danger ml-4">Kembali</a>
          <a href="<?= route('tenda.edit', $tenda->id) ?>" class="btn btn-sm btn-primary">Update</a>
        </div>
      </div>
    </div>
  </div>
@endsection
