@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Tipe tenda</h1>
    </div>

    <a href="<?= route('tipe_tenda.create') ?>" class="btn btn-primary mb-3">Tambah Data</a>
    @if ($alert = session('alert'))
      <div class="alert alert-{{ $alert['mode'] }} alert-dismissible fade show" role="alert">
        {{ $alert['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <table class="table table-stripped table-bordered table-hover">
      <thead>
        <tr>
          <th width="20px;">No</th>
          <th>Kode Tipe</th>
          <th>Nama Tipe</th>
          <th width="180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @php $no=1; @endphp
        @foreach ($tipe as $tp)
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $tp->kode ?></td>
            <td><?= $tp->nama ?></td>
            <td>
              <a href="<?= route('tipe_tenda.edit', ['tipe_tenda' => $tp->kode]) ?>" class="btn btn-sm btn-primary"><i
                  class="fas fa-edit"></i></a>
              <a onclick="return delete_tipe_tenda('{{ $tp->kode }}')" href="#" class="btn btn-sm btn-danger"><i
                  class="fas fa-trash"></i></a>
              <form action="{{ route('tipe_tenda.destroy', ['tipe_tenda' => $tp->kode]) }}" method="POST"
                id="hapus-tipe-tenda-{{ $tp->kode }}">
                @csrf
                @method('DELETE')
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </section>

  <script>
    function delete_tipe_tenda(id_tipe_tenda) {
      if (confirm('Yakin hapus?')) {
        document.getElementById('hapus-tipe-tenda-' + id_tipe_tenda).submit();
      }

      return false
    }
  </script>
  </script>
@endsection
