@extends('home.template')

@section('content')
  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
      <div class="hero__item set-bg" data-setbg="{{ url('assets/gambar/hero.jpg') }}">
        <div class="hero__text">
          <span>Rental Tenda</span>
          <h2>Tenda <br />Ciremai</h2>
          <p>Untuke keperluan camping</p>
          <a href="#" class="primary-btn">Rental Sekarang</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->
@endsection
