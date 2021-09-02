@extends('landingpage.layout-landing')

@section('title', 'TukuTiket')

@section('content')
<!--carousel-->
  <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 carousel-img" src="{{ url('/bahanuser/img/1.jpg') }}" alt="First slide">
          <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
            <h1 class="text-uppercase">Temukan berbagai event menarik yang ada di yogyakarta</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 carousel-img" src="{{ url('/bahanuser/img/tari.jpg') }}" alt="Second slide">
          <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
            <h1 class="text-uppercase">Berbagai event dengan bermacam kategori</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 carousel-img" src="{{ url('/bahanuser/img/meeting.jpg') }}" alt="Third slide">
          <div class="carousel-caption d-flex h-100 align-items-center justify-content-center">
            <h1 class="text-uppercase">Buat dan promosikan eventmu sendiri</h1>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="fas fa-arrow-circle-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="fas fa-arrow-circle-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
    </div>
  </section>
  <!--end carousel-->

  <!--Upcoming Event cards-->
  <section class="cards-section">
    <div class="container-fluid">
      <h1 class="text-uppercase h1-card">Event Festival</h1>
      <div class="row">
       <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        @if(!$eventfestival->isEmpty())
        @foreach($eventfestival as $eventfestivalall)
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a href="{{ url('/eventfestival/' .$eventfestivalall->id) }}">
              <div class="card-img-hover" style="background-image: url({{asset('event/poster_event/'.$eventfestivalall->poster_event)}});">
                <p class="card-time"><span class="fas fa-calendar-day"></span> {{ $eventfestivalall->tanggal_mulai }}</p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">{{ $eventfestivalall->harga_min }} - {{ $eventfestivalall->harga_max }}</span></span>
              <a href="#" class="card-title d-inline-block">{{ $eventfestivalall->nama_event }}</a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> {{ $eventfestivalall->nama_tempat }}</p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: {{ $eventfestivalall->nama_kategorievent }}</span>
              <a href="#" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div>
      @endforeach
      @endif
        <!-- <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a href="#">
              <div class="card-img-hover">
                <p class="card-time"><span class="fas fa-calendar-day"></span> 15 Juli 2020</p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">250.000</span></span>
              <a href="#" class="card-title d-inline-block">Java Open Air</a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> JEC, Bantul, Yogyakarta</p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: Musik</span>
              <a href="#" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a href="#">
              <div class="card-img-hover">
                <p class="card-time"><span class="fas fa-calendar-day"></span> 15 Juli 2020</p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">250.000</span></span>
              <a href="#" class="card-title d-inline-block">Java Open Air</a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> JEC, Bantul, Yogyakarta</p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: Musik</span>
              <a href="#" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a href="#">
              <div class="card-img-hover">
                <p class="card-time"><span class="fas fa-calendar-day"></span> 15 Juli 2020</p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">250.000</span></span>
              <a href="#" class="card-title d-inline-block">Java Open Air</a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> JEC, Bantul, Yogyakarta</p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: Musik</span>
              <a href="#" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div> -->
      </div>
      <!-- <a href="allevent.html" class="btn btn-seeall float-right text-uppercase">Lihat Semua</a> -->
    </div>
  </section>
  <!--end upcoming event-->

  <!--Musik Event cards-->
  <section class="cards-section cards-section-musik">
    <div class="container-fluid">
      <h1 class="text-uppercase h1-card-2">Event Musik</h1>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        @if(!$eventmusik->isEmpty())
        @foreach($eventmusik as $eventmusikall)
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a href="{{ url('/eventmusik/' .$eventmusikall->id) }}">
              <div class="card-img-hover" style="background-image: url({{asset('event/poster_event/'.$eventmusikall->poster_event)}});">
                <p class="card-time"><span class="fas fa-calendar-day"></span> {{ $eventmusikall->tanggal_mulai }}</p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">{{ $eventmusikall->harga_min }} - {{ $eventmusikall->harga_max }}</span></span>
              <a href="#" class="card-title d-inline-block">{{ $eventmusikall->nama_event }}</a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> {{ $eventmusikall->nama_tempat }}</p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: {{ $eventmusikall->nama_kategorievent }}</span>
              <a href="#" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div>
      @endforeach
      @endif
      </div>
      <!-- <a href="allevent.html" class="btn btn-seeall float-right text-uppercase">Lihat Semua</a> -->
    </div>
  </section>
  <!--end Musik event-->

  <!--Seni Event cards-->
  <section class="cards-section">
    <div class="container-fluid">
      <h1 class="text-uppercase h1-card-3">Event Seni</h1>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      @if(!$eventseni->isEmpty())
      @foreach($eventseni as $eventseniall)
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a href="{{ url('/eventseni/' .$eventseniall->id) }}">
              <div class="card-img-hover" style="background-image: url({{asset('event/poster_event/'.$eventseniall->poster_event)}});">
                <p class="card-time"><span class="fas fa-calendar-day"></span> {{ $eventseniall->tanggal_mulai }}</p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">{{ $eventseniall->harga_min }} - {{ $eventseniall->harga_max }}</span></span>
              <a href="#" class="card-title d-inline-block">{{ $eventseniall->nama_event }}</a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> {{ $eventseniall->nama_tempat }}</p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: {{ $eventseniall->nama_kategorievent }}</span>
              <a href="#" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div>
      @endforeach
      @endif
      </div>
      <!-- <a href="allevent.html" class="btn btn-seeall float-right text-uppercase">Lihat Semua</a> -->
    </div>
  </section>
  <!--end seni event-->

  <!-- Banner Section-->
  <section class="banner-section spad" id="banner-kategori">
    <div class="container-fluid">
      <h1 class="text-center text-uppercase mb-3">Lihat event lainnya dari berbagai kategori</h1>
      <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/musik.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Musik</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/festival.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Festival</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/olahraga.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Olahraga</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/seni.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Seni</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/seminar.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Seminar</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/workshop.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Workshop & Business</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/food.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Makanan</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/tari.png') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Tari</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="single-banner">
            <img src="{{ url('/bahanuser/img/lainnya.jpg') }}" alt="">
            <div class="inner-text">
              <a class="btn text-uppercase" href="#" role="button">Lainnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Banner Section-->
@endsection