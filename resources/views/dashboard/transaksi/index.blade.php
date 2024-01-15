@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

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
        <th>Cek Pembayaran</th>
        <th>Total Pembayaran</th>
        <th>Action</th>
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
              <span class="badge badge-primary">{{ $pkt->rental_paket->jumlah }} {{ $pkt->nama }}</span>
            @endforeach
          </td>
          <td>
            @foreach ($tr->rental->tenda as $td)
              <span class="badge badge-primary">{{ $td->rental_tenda->jumlah }} {{ $td->merek }}</span>
            @endforeach
          </td>
          <td>
            @foreach ($tr->rental->barang as $br)
              <span class="badge badge-primary">{{ $br->rental_barang->jumlah }} {{ $br->nama }}</span>
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

          <td>
            <center>
              @if (empty($tr->bukti_pembayaran))
                <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
              @else
                <a class="btn btn-sm btn-primary" href="<?= url('admin/transaksi/pembayaran/' . $tr->id_rental) ?>"><i
                    class="fas fa-check-circle"></i></a>
              @endif
            </center>
          </td>

          <td>
            Rp. {{ number_format($tr->harga + $tr->total_denda, 0, ',', '.') }}
          </td>

          <td>
            <div class="row">
              <a class="btn btn-sm btn-success mr-2"
                href="<?= url('admin/transaksi/transaksi_selesai/' . $tr->id_rental) ?>"><i class="fas fa-check"></i></a>
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger"
                href="<?= url('admin/transaksi/batal_transaksi/' . $tr->id_rental) ?>"><i class="fas fa-times"></i></a>
            </div>
          </td>
        </tr>
      @endforeach
    </table>
  </section>
@endsection
