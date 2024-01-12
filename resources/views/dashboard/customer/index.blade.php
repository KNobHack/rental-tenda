@extends('dashboard.template')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Data Customer</h1>
    </div>

    <a href="<?= route('customer.create') ?>" class="btn btn-primary mb-3">Tambah Customer</a>
    @if ($alert = session('alert'))
      <div class="alert alert-{{ $alert['mode'] }} alert-dismissible fade show" role="alert">
        {{ $alert['message'] }}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <table class="table table-hover table-striped table-responsive table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Alamat</th>
          <th>Gender</th>
          <th>No. Telepon</th>
          <th>No. KTP</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php 
		    $no = 1;
		    foreach($customer as $cs): ?>
        <tr>
          <td><?= $no++ ?>.</td>
          <td><?= $cs->penyewa->nama ?></td>
          <td><?= $cs->username ?></td>
          <td><?= $cs->penyewa->alamat ?></td>
          <td><?= $cs->penyewa->gender ?></td>
          <td><?= $cs->penyewa->no_telepon ?></td>
          <td><?= $cs->penyewa->no_ktp ?></td>
          <td>
            <div class="row">
              <a href="<?= route('customer.edit', $cs->id) ?>" class="btn btn-sm btn-primary mr-2"><i
                  class="fas fa-edit"></i></a>
              <a onclick="return delete_customer('{{ $cs->id }}')" href="#" class="btn btn-sm btn-danger"><i
                  class="fas fa-trash"></i></a>
              <form action="{{ route('customer.destroy', $cs->id) }}" method="POST"
                id="hapus-customer-{{ $cs->id }}">
                @csrf
                @method('DELETE')
            </div>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </section>

  <script>
    function delete_customer(id_customer) {
      if (confirm('Yakin hapus?')) {
        document.getElementById('hapus-customer-' + id_customer).submit();
      }

      return false
    }
  </script>
@endsection
