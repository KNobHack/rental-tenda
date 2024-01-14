@extends('home.template')

@section('content')
  <!-- Product Details Section Begin -->
  <section class="product-details spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="product__details__pic">
            <div class="product__details__pic__item">
              <img class="product__details__pic__item--large" src="{{ url('/assets/upload/' . $paket->gambar) }}"
                alt="">
            </div>
            {{-- <div class="product__details__pic__slider owl-carousel">
              <img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/product/details/thumb-1.jpg"
                alt="">
              <img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/product/details/thumb-2.jpg"
                alt="">
              <img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/product/details/thumb-3.jpg"
                alt="">
              <img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/product/details/thumb-4.jpg"
                alt="">
            </div> --}}
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="product__details__text">
            <h3>{{ $paket->nama }}</h3>
            <div class="product__details__price">Rp. {{ number_format($paket->harga, 0, ',', '.') }} / hari</div>
            <form action="" style="display: inline">
              <div class="product__details__quantity">
                <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" value="1" name="jumlah">
                  </div>
                </div>
              </div>
            </form>
            <a href="#" class="primary-btn">Masukkan ke keranjang</a>
            <ul>
              {{-- <li><b>Ketersediaan</b> <span>In Stock</span></li> --}}
              <li><b>Tenda</b> <span>
                  @foreach ($paket->tenda as $td)
                    {{ $td->tenda_paket->jumlah }} {{ $td->merek }},
                  @endforeach
                </span></li>
              <li><b>Barang</b> <span>
                  @foreach ($paket->barang as $br)
                    {{ $br->barang_paket->jumlah }} {{ $br->nama }},
                  @endforeach
                </span></li>
              <li><b>Denda</b> <span>Rp. {{ number_format($paket->denda, 0, ',', '.') }} <samp> /hari</samp></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Details Section End -->
@endsection
