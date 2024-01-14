@extends('home.template')

@section('content')
  <!-- Hero Section Begin -->
  <section class="hero hero-normal">
    <div class="container">
      <div class="hero__search">
        <div class="hero__search__form">
          <form method="GET">
            <input type="text" name="s" placeholder="Cari" value="{{ request()->get('s') }}">
            <button type="submit" class="site-btn">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2 class="text-dark">{{ $title ?? 'Tenda Ciremai' }}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        @foreach ($item as $i)
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="{{ url('/assets/upload/' . $i->gambar) }}">
                <ul class="product__item__pic__hover">
                  <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="{{ $i->link_detail }}">{{ $i->nama ?? $i->merek }}</a></h6>
                <h5>Rp. {{ number_format($i->harga, 0, ',', '.') }} / hari</h5>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      {{-- <div class="product__pagination">
        <a href="#"><i class="fa fa-long-arrow-left"></i></a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
      </div> --}}
    </div>
  </section>
  <!-- Product Section End -->
@endsection
