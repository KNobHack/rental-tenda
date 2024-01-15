@extends('home.template')

@section('content')
  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      <div class="checkout__form">
        <h4>Checkout</h4>
        <div class="row">
          <div class="col-lg-8 col-md-6">
            <div class="checkout__input">
              <p>Nama Lengkap</p>
              <input type="text" readonly value="{{ $penyewa->nama }}">
            </div>
            <div class="checkout__input">
              <p>Alamat</p>
              <input type="text" readonly value="{{ $penyewa->alamat }}">
            </div>
            <div class="checkout__input">
              <p>Gender</p>
              <input type="text" readonly value="{{ $penyewa->gender }}">
            </div>
            <div class="checkout__input">
              <p>No Telepon</p>
              <input type="text" readonly value="{{ $penyewa->no_telepon }}">
            </div>
            <div class="checkout__input">
              <p>No KTP</p>
              <input type="text" readonly value="{{ $penyewa->no_ktp }}">
            </div>
            <div class="checkout__input">
              <p>Lama Rental</p>
              <input type="text" name="tanggal"
                value="{{ date('d-m-Y', strtotime($keranjang->tgl_rental)) }} - {{ date('d-m-Y', strtotime($keranjang->tgl_kembali)) }}"
                readonly>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="checkout__order">
              <h4>Pesanan Anda</h4>
              <div class="checkout__order__products">Products <span>Total</span></div>
              <ul>
                @foreach ($paket as $pkt)
                  <li>{{ $pkt->keranjang_paket->jumlah }} {{ $pkt->nama }}<span>Rp.
                      {{ number_format($pkt->harga * $pkt->keranjang_paket->jumlah, 0, ',', '.') }}</span></li>
                @endforeach
                @foreach ($tenda as $td)
                  <li>{{ $td->keranjang_tenda->jumlah }} {{ $td->merek }}<span>Rp.
                      {{ number_format($td->harga * $pkt->keranjang_tenda->jumlah, 0, ',', '.') }}</span></li>
                @endforeach
                @foreach ($barang as $br)
                  <li>{{ $br->keranjang_barang->jumlah }} {{ $br->nama }}<span>Rp.
                      {{ number_format($br->harga * $pkt->keranjang_barang->jumlah, 0, ',', '.') }}</span></li>
                @endforeach
              </ul>
              <div class="checkout__order__subtotal">Subtotal <span>Rp.
                  {{ number_format($subtotal, 0, ',', '.') }}</span>
              </div>
              <div class="checkout__order__subtotal">Lama rental
                <span>{{ $lama_rental }} hari</span>
              </div>
              <div class="checkout__order__total">Total <span>Rp. {{ number_format($total, 0, ',', '.') }}</span></div>
              <p>Jika terlambat mengembalikan, maka akan di denda sebesar Rp.
                {{ number_format($subdenda, 0, ',', '.') }} / hari</p>
              <button type="submit" class="site-btn">Pesan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->
@endsection
