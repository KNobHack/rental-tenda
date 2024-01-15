@extends('home.template')

@section('content')
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="shoping__cart__table">
            <table>
              <thead>
                <tr>
                  <th class="shoping__product">Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                  $bisa_checkout = false;
                @endphp
                @foreach ($paket as $pkt)
                  @php
                    $bisa_checkout = true;
                  @endphp
                  <tr>
                    <td class="shoping__cart__item">
                      <img height="100px" width="100px" src="{{ url('/assets/upload/' . $pkt->gambar) }}" alt="">
                      <h5>{{ $pkt->nama }}</h5>
                    </td>
                    <td class="shoping__cart__price">
                      Rp. {{ number_format($pkt->harga, 0, ',', '.') }}
                    </td>
                    <td class="shoping__cart__quantity">
                      <input type="number" value="{{ $pkt->keranjang_paket->jumlah }}" class="input-jumlah"
                        data-form-url="{{ route('keranjang.tambah.paket', $pkt->id) }}">
                    </td>
                    <td class="shoping__cart__total">
                      Rp. {{ number_format($pkt->harga * $pkt->keranjang_paket->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="shoping__cart__item__close">
                      <span class="icon_close"
                        onclick="document.getElementById('hapus-paket-{{ $pkt->id }}').submit()"></span>
                      <form action="{{ route('keranjang.hapus.paket', $pkt->id) }}" method="POST"
                        id="hapus-paket-{{ $pkt->id }}">
                        @csrf
                        @method('DELETE')
                      </form>
                    </td>
                  </tr>
                @endforeach
                @foreach ($tenda as $td)
                  @php
                    $bisa_checkout = true;
                  @endphp
                  <tr>
                    <td class="shoping__cart__item">
                      <img height="100px" width="100px" src="{{ url('/assets/upload/' . $td->gambar) }}" alt="">
                      <h5>{{ $td->merek }}</h5>
                    </td>
                    <td class="shoping__cart__price">
                      Rp. {{ number_format($td->harga, 0, ',', '.') }}
                    </td>
                    <td class="shoping__cart__quantity">
                      <input type="number" value="{{ $td->keranjang_tenda->jumlah }}" class="input-jumlah"
                        data-form-url="{{ route('keranjang.tambah.tenda', $td->id) }}">
                    </td>
                    <td class="shoping__cart__total">
                      Rp. {{ number_format($td->harga * $td->keranjang_tenda->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="shoping__cart__item__close">
                      <span class="icon_close"
                        onclick="document.getElementById('hapus-tenda-{{ $td->id }}').submit()"></span>
                      <form action="{{ route('keranjang.hapus.tenda', $td->id) }}" method="POST"
                        id="hapus-tenda-{{ $td->id }}">
                        @csrf
                        @method('DELETE')
                      </form>

                    </td>
                  </tr>
                @endforeach
                @foreach ($barang as $br)
                  @php
                    $bisa_checkout = true;
                  @endphp
                  <tr>
                    <td class="shoping__cart__item">
                      <img height="100px" width="100px" src="{{ url('/assets/upload/' . $br->gambar) }}" alt="">
                      <h5>{{ $br->nama }}</h5>
                    </td>
                    <td class="shoping__cart__price">
                      Rp. {{ number_format($br->harga, 0, ',', '.') }}
                    </td>
                    <td class="shoping__cart__quantity">
                      <input type="number" value="{{ $br->keranjang_barang->jumlah }}" class="input-jumlah"
                        data-form-url="{{ route('keranjang.tambah.barang', $br->id) }}">
                    </td>
                    <td class="shoping__cart__total">
                      Rp. {{ number_format($br->harga * $br->keranjang_barang->jumlah, 0, ',', '.') }}
                    </td>
                    <td class="shoping__cart__item__close">
                      <span class="icon_close"
                        onclick="document.getElementById('hapus-barang-{{ $br->id }}').submit()"></span>
                      <form action="{{ route('keranjang.hapus.barang', $br->id) }}" method="POST"
                        id="hapus-barang-{{ $br->id }}">
                        @csrf
                        @method('DELETE')
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="shoping__continue">
            <div class="shoping__discount">
              <h5>Lama Rental</h5>
              <form class="form-inline" action="{{ route('keranjang.setTanggal') }}" method="POST">
                @csrf
                <input type="text" id="input-tgl" name="tanggal"
                  value="{{ date('d-m-Y', strtotime($keranjang->tgl_rental)) }} - {{ date('d-m-Y', strtotime($keranjang->tgl_kembali)) }}">

                <button type="submit" class="site-btn">Hitung</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="shoping__checkout">
            <h5>Total Belanja</h5>
            <ul>
              <li>Subtotal <span>Rp. {{ number_format($subtotal, 0, ',', '.') }} / hari</span></li>
              <li>Lama rental <span>{{ $lama_rental }} hari</span></li>
              <li>Total <span>Rp. {{ number_format($total, 0, ',', '.') }}</span></li>
              <li>Denda Terlambat Mengembalikan <span>Rp. {{ number_format($subdenda, 0, ',', '.') }} / hari</span></li>
            </ul>
            @if ($bisa_checkout)
              <a href="{{ route('checkout.preview') }}" class="primary-btn">CHECKOUT</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shoping Cart Section End -->

  <form action="" class="d-none" id="form-keranjang" method="POST">
    @csrf
    <input type="number" name="jumlah">
  </form>

  <script>
    $('#input-tgl').daterangepicker({
      minDate: moment(),
      locale: {
        format: 'DD/MM/YYYY'
      }
    });

    $(document).ready(function() {
      $('.input-jumlah').change(function() {
        let val = $(this).val();
        let url = $(this).data('form-url');

        let input = $('#form-keranjang>input[name=jumlah]');
        input.val(val);

        let form = $('#form-keranjang');
        form.attr('action', url);

        form.submit();

      });

      console.log($('.input-jumlah'));
    })
  </script>
@endsection
