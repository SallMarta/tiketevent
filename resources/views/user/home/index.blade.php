@extends('user.layouts')

@section('title', 'TukuTiket')

@section('content')
<!--event cards & filter-->
  <section class="cards-all-section spad">
    <h1 class="text-uppercase mb-1 h1-card">Event Mendatang</h1>
    <p class="text-uppercase p-title mb-3">Jelajahi event-event yang akan datang</p>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 sidebar-filter">
          <div class="container-fluid mb-4">
            <h4 class="filter-title">Filter Berdasarkan</h4>
            <div class="dropdown">
              <button class="btn btn-filter dropdown-toggle text-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item lgi-filter" href="#">Semua</a>
                <a class="dropdown-item lgi-filter" href="#">Musik</a>
                <a class="dropdown-item lgi-filter" href="#">Festival</a>
                <a class="dropdown-item lgi-filter" href="#">Olahraga</a>
                <a class="dropdown-item lgi-filter" href="#">Seni</a>
                <a class="dropdown-item lgi-filter" href="#">Seminar</a>
                <a class="dropdown-item lgi-filter" href="#">Workshop & Business</a>
                <a class="dropdown-item lgi-filter" href="#">Makanan</a>
                <a class="dropdown-item lgi-filter" href="#">Tari</a>
                <a class="dropdown-item lgi-filter" href="#">Lainnya</a>
              </div>
            </div>
            <hr>
            <div class="dropdown">
              <button class="btn btn-filter dropdown-toggle text-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Waktu</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item lgi-filter" href="#">Semua</a>
                <a class="dropdown-item lgi-filter" href="#">Akan Datang</a>
              </div>
            </div>
            <hr>
            <div class="dropdown">
              <button class="btn btn-filter dropdown-toggle text-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lokasi</button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item lgi-filter" href="#">Kota Yogyakarta</a>
                <a class="dropdown-item lgi-filter" href="#">Sleman</a>
                <a class="dropdown-item lgi-filter" href="#">Bantul</a>
                <a class="dropdown-item lgi-filter" href="#">Kulon Progo</a>
                <a class="dropdown-item lgi-filter" href="#">Gunung Kidul</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            @if(!$eventall->isEmpty())
            @foreach($eventall as $event)
            <div class="col-lg-4 mb-5 col-sm-6 col-md-6 ">
              <div class="card card-all card-1">
                <div class="card-info-hover">
                  <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
                </div>
                <div class="card-img"></div>
                <a href="{{ url('/event/' .$event->id .'/detail') }}">
                  <div class="card-img-hover" style="background-image: url({{asset('event/poster_event/'.$event->poster_event)}});">
                    <p class="card-time"><span class="fas fa-calendar-day"></span>{{ $event->tanggal_mulai }}</p>
                  </div>
                </a>
                <div class="card-info">
                  <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">{{ $event->harga_min }} - {{ $event->harga_max }}</span></span>
                  <a href="#" class="card-title d-inline-block">{{ $event->nama_event }}</a>
                  <p class="card-location"><span class="fas fa-map-marker-alt"></span> {{ $event->nama_tempat }}</p>
                  <span class="card-category d-inline-block text-uppercase"> Kategori: {{ $event->nama_kategorievent }}</span>
                  <a href="#" class="card-more">Lihat detail</a>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            
          </div>
        </div>
      
        
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end event cards-->

  <!--pagination-->
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <!-- <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span class="fas fa-angle-double-left"></span>
        </a>
      </li> -->
      {{ $eventall->links() }}
      <!-- <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span class="fas fa-angle-double-right"></span>
        </a>
      </li> -->
    </ul>
  </nav>
  <!--end pagination-->
@endsection