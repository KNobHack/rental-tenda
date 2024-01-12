<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
        <div class="d-sm-none d-lg-inline-block">Admin </div>
      </a>
    </li>
  </ul>
</nav>
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= url('admin/dashboard') ?>">Rental Alat Camping</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">RM</a>
    </div>
    <ul class="sidebar-menu">
      <li>
        <a class="nav-link" href="<?= url('admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li>
        <a class="nav-link" href="<?= route('tenda.index') ?>">
          <i class="fas fa-car"></i>
          <span>Data Tenda</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="<?= route('tipe_tenda.index') ?>">
          <i class="fas fa-grip-horizontal"></i>
          <span>Data Tipe</span></a>
      </li>
      <li>
        <a class="nav-link" href="<?= route('barang.index') ?>">
          <i class="fas fa-grip-horizontal"></i>
          <span>Data Barang</span></a>
      </li>
      <li>
        <a class="nav-link" href="<?= route('paket.index') ?>">
          <i class="fas fa-car"></i>
          <span>Data Paket</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="<?= route('customer.index') ?>">
          <i class="fas fa-users"></i>
          <span>Data Customer</span></a>
      </li>
      <li>
        <a class="nav-link" href="<?= route('transaksi.index') ?>">
          <i class="fas fa-random"></i>
          <span>Transaksi</span></a>
      </li>
      <li>
        <a class="nav-link" href="<?= url('admin/laporan') ?>">
          <i class="fas fa-clipboard-list"></i>
          <span>Laporan</span></a>
      </li>
      <li>
        <a class="nav-link" href="#" onclick="document.getElementById('form-logout').submit()">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <form action="<?= route('logout') ?>" id="form-logout" method="POST">
        @csrf
      </form>
      <li>
        <a class="nav-link" href="<?= url('auth/ganti_password') ?>"><i class="fas fa-lock"></i>
          <span>Ganti Password</span></a>
      </li>
    </ul>
  </aside>
</div>
