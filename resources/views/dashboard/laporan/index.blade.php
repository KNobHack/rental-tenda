@extends('dashboard.template')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Laporan Transaksi</h1>
  </div>
  <form action="<?= route('laporan.index') ?>" method="GET">
    <div class="form-group">
      <label for="">Dari Tanggal</label>
      <input type="date" name="dari" class="form-control" value="<?= ($dari) ?? $dari ?>">
    </div>
    <div class="form-group">
      <label for="">Sampai Tanggal</label>
      <input type="date" name="sampai" class="form-control" value="<?= ($sampai) ?? $sampai ?>">
    </div>

    <button type="submit" class="btn btn-sm btn-primary" name="cari"><i class="fas fa-eye"></i> Tampilkan Data</button>
  </form>

  @if (isset($transaksi))
  <table class="table table-responsive table-bordered table-striped">
    <tr>
      <th>No</th>
      <th>Customer</th>
      <th>Paket</th>
      <th>Tenda</th>
      <th>Barang</th>
      <th>Tgl. Rental</th>
      <th>Tgl. Kembali</th>
      <th>Harga/Hari</th>
      <th>Denda/Hari</th>
      <th>Total Denda</th>
      <th>Tgl. Dikembalikan</th>
      <th>Status Rental</th>
    </tr>

    @php
    $no = 1;
    @endphp
    @foreach ($transaksi as $tr)
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $tr->rental->penyewa->nama ?></td>
      <td>
        @foreach ($tr->rental->paket as $pkt)
        {{ $pkt->rental_paket->jumlah }} {{ $pkt->nama }}
        @endforeach
      </td>
      <td>
        @foreach ($tr->rental->tenda as $td)
        {{ $td->rental_tenda->jumlah }} {{ $td->merek }}
        @endforeach
      </td>
      <td>
        @foreach ($tr->rental->barang as $br)
        {{ $br->rental_barang->jumlah }} {{ $br->nama }}
        @endforeach
      </td>
      <td><?= date('d/m/Y', strtotime($tr->rental->tgl_rental)) ?></td>
      <td><?= date('d/m/Y', strtotime($tr->rental->tgl_kembali)) ?></td>
      <td>Rp.<?= number_format($tr->harga, 0, ',', '.') ?>,-</td>
      <td>Rp.<?= number_format($tr->denda, 0, ',', '.') ?>,-</td>
      <td>Rp. </td>
      <td>
        <?php if ($tr->rental->tgl_pengembalian == null) {
          echo '-';
        } else {
          echo date('d/m/Y', strtotime($tr->rental->tgl_pengembalian));
        } ?>
      </td>
      <td>
        <?php if ($tr->rental->rental_selesai == false) {
          echo 'Belum Selesai';
        } else {
          echo 'Selesai';
        } ?>
      </td>

    </tr>
    @endforeach
  </table>
  @endif
</section>
@endsection