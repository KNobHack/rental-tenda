<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tenda Ciremai</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/bootstrap.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/font-awesome.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/elegant-icons.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/nice-select.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/jquery-ui.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/owl.carousel.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/slicknav.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/assets_ogani/css/style.css') }}" type="text/css">
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Humberger Begin -->
  <div class="humberger__menu__overlay"></div>
  <div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
      <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
      <ul>
        <li><a href="#"><i class="fa fa-random"></i></a></li>
        <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
      </ul>
      <div class="header__cart__price">total: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
      <div class="header__top__right__auth">
        <a href="#"><i class="fa fa-user"></i> Login</a>
      </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
      <ul>
        <li class="active"><a href="{{ route('beranda') }}">Beranda</a></li>
        <li><a href="{{ route('sewa-paket') }}">Sewa Paket</a></li>
        <li><a href="{{ route('sewa-tenda') }}">Sewa Tenda</a></li>
        <li><a href="{{ route('sewa-barang') }}">Sewa Barang</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
      <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <div class="humberger__menu__contact">
      <ul>
        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
      </ul>
    </div>
  </div>
  <!-- Humberger End -->

  <!-- Header Section Begin -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="header__top__left">
              <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="header__top__right">
              <div class="header__top__right__social">
                <a href="#"><i class="fa fa-instagram"></i></a>
              </div>
              <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="header__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="header__menu">
            <ul>
              <li class="active"><a href="{{ route('beranda') }}">Beranda</a></li>
              <li><a href="{{ route('sewa-paket') }}">Sewa Paket</a></li>
              <li><a href="{{ route('sewa-tenda') }}">Sewa Tenda</a></li>
              <li><a href="{{ route('sewa-barang') }}">Sewa Barang</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="header__cart">
            <ul>
              <li><a href="#"><i class="fa fa-random"></i> <span>3</span></a></li>
              <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">total: <span>$150.00</span></div>
          </div>
        </div>
      </div>
      <div class="humberger__open">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </header>
  <!-- Header Section End -->

  @yield('content')

  <!-- Footer Section Begin -->
  <footer class="footer spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__about__logo">
              <a href="./index.html"><img src="img/logo.png" alt=""></a>
            </div>
            <ul>
              <li>Alamat: Jl. Raya Cigugur, Kuningan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511</li>
              <li>Telepon: +62 831-0125-3134</li>
              {{-- <li>Email: hello@colorlib.com</li> --}}
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
          <div class="footer__widget">
            <h6>Jam Buka</h6>
            <ul>
              <li>Senin :</li>
              <li>Selasa :</li>
              <li>Rabu :</li>
              <li>Kamis :</li>
              <li>Jumat :</li>
              <li>Sabtu :</li>
              <li>Minggu :</li>
            </ul>
            <ul>
              <li>08:00 - 20:00</li>
              <li>08:00 - 20:00</li>
              <li>08:00 - 20:00</li>
              <li>08:00 - 20:00</li>
              <li>08:00 - 20:00</li>
              <li>08:00 - 20:00</li>
              <li>08:00 - 20:00</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="footer__copyright">
            <div class="footer__copyright__text">
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <script src="{{ url('assets/assets_ogani/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/jquery-ui.min.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/jquery.slicknav.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/mixitup.min.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('assets/assets_ogani/js/main.js') }}"></script>
</body>

</html>
