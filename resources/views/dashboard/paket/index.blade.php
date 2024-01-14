@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Paket</h1>
    </div>

    <a href="<?= route('paket.create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
    @if ($alert = session('alert'))
      <div class="alert alert-{{ $alert['mode'] }} alert-dismissible fade show" role="alert">
        {{ $alert['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Paket</th>
          <th>Harga</th>
          <th>Denda</th>
          <th>Tenda</th>
          <th>Barang</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($paket as $pkt): ?>
        <tr>
          <td><?= $no++ ?>.</td>
          <td><?= $pkt->nama ?></td>
          <td><?= $pkt->harga ?></td>
          <td><?= $pkt->denda ?></td>
          <td>
            @foreach ($pkt->tenda as $td)
              <span class="badge badge-primary">{{ $td->tenda_paket->jumlah }} {{ $td->merek }}</span>
            @endforeach
          </td>
          <td>
            @foreach ($pkt->barang as $br)
              <span class="badge badge-primary">{{ $br->barang_paket->jumlah }} {{ $br->nama }}</span>
            @endforeach
          </td>
          <td>
            <a href="<?= route('paket.edit', $pkt->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
            <a onclick="return delete_paket('{{ $pkt->id }}')" href="#" class="btn btn-sm btn-danger"><i
                class="fas fa-trash"></i></a>
            <form action="{{ route('paket.destroy', $pkt->id) }}" method="POST" id="hapus-paket-{{ $pkt->id }}">
              @csrf
              @method('DELETE')
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <script>
    function delete_paket(id_paket) {
      if (confirm('Yakin hapus?')) {
        document.getElementById('hapus-paket-' + id_paket).submit();
      }

      return false
    }
  </script>
@endsection
