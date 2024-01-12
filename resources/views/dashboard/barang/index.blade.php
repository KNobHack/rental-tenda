@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Tenda</h1>
    </div>

    <a href="<?= route('barang.create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
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
          <th>Gambar</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Denda</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($barang as $br): ?>
        <tr>
          <td><?= $no++ ?>.</td>
          <td>
            <img width="70px;" src="<?= url('assets/upload/' . $br->gambar) ?>" alt="">
          </td>
          <td><?= $br->nama ?></td>
          <td><?= $br->harga ?></td>
          <td><?= $br->denda ?></td>
          <td>
            <a onclick="return delete_barang('{{ $br->id }}')" href="#" class="btn btn-sm btn-danger"><i
                class="fas fa-trash"></i></a>
            <form action="{{ route('barang.destroy', $br->id) }}" method="POST" id="hapus-barang-{{ $br->id }}">
              @csrf
              @method('DELETE')
            </form>
            <a href="<?= route('barang.edit', $br->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <script>
    function delete_barang(id_barang) {
      if (confirm('Yakin hapus?')) {
        document.getElementById('hapus-barang-' + id_barang).submit();
      }

      return false
    }
  </script>
@endsection
