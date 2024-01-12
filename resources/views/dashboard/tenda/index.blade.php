@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Tenda</h1>
    </div>

    <a href="<?= route('tenda.create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
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
          <th>Tipe</th>
          <th>Merek</th>
          <th>kapasitas</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($tenda as $mb): ?>
        <tr>
          <td><?= $no++ ?>.</td>
          <td>
            <img width="70px;" src="<?= url('assets/upload/' . $mb->gambar) ?>" alt="">
          </td>
          <td><?= $mb->kode_tipe ?></td>
          <td><?= $mb->merek ?></td>
          <td><?= $mb->kapasitas ?></td>
          <td>
            @if ($mb->tersedia == false)
              <span class="badge badge-danger">Tidak Tersedia</span>
            @else
              <span class="badge badge-primary">Tersedia</span>
            @endif
          </td>
          <td>
            <a href="<?= route('tenda.show', $mb->id) ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
            <a onclick="return delete_tenda('{{ $mb->id }}')" href="#" class="btn btn-sm btn-danger"><i
                class="fas fa-trash"></i></a>
            <form action="{{ route('tenda.destroy', $mb->id) }}" method="POST" id="hapus-tenda-{{ $mb->id }}">
              @csrf
              @method('DELETE')
            </form>
            <a href="<?= route('tenda.edit', $mb->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <script>
    function delete_tenda(id_tenda) {
      if (confirm('Yakin hapus?')) {
        document.getElementById('hapus-tenda-' + id_tenda).submit();
      }

      return false
    }
  </script>
@endsection
