@extends('admin.layout')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-default">

    <section class="detail-event-section mt-5 mb-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-sm-12 text-center mb-4">
          <img src="{{asset('/event/poster_event/' .$events->poster_event)}}" class="img-detail-event" height="300" width="250">
          <p class="mt-5">{{ $events->deskripsi }}</p>
        </div>
        <div class="col-md-12 col-lg-6 col-sm-12">
          <h1 class="text-center event-detail-title">{{ $events->nama_event }}</h1>
          <!-- <h4 class="text-center mb-5">Fear The Fest</h4> -->
          
          <ul class="nav nav-tabs justify-content-left" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link nav-detail active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true"><span class="fas fa-bookmark"></span> Detail</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active mt-4 mb-3" id="detail" role="tabpanel" aria-labelledby="detail-tab">
              <p class="by-user"><span class="fas fa-user-circle"></span> Pengupload :<a href="userprofile.html" class="by-user"> {{ $events->nama_pemilik }}</a> </p>
              <p>Kategori Event: {{ $events->nama_kategorievent }}</p>
              <p><span class="fas fa-calendar-day"></span> {{ $events->tanggal_mulai }}</p>
              <p><span class="fas fa-map-marker-alt"></span> {{ $events->nama_tempat }}</p>
              <!-- <p><span class="fas fa-clock"></span> 17.00 s/d 23.00</p> -->
            </div>
            @if(!$detail->isEmpty())
            @foreach($detail as $details)
            <div class="col-md-12 pt-5 mt-5 pb-5 mb-5">
              <div class="card">
                    <div class="card-img-overlay">
                        <h3 class="card-title">{{ $details->id_kategoritiket}}</h3>
                        <h4 class="card-subtitle">Stok : {{ $details->qty }} | Harga : {{ $details->harga }}</h4>
                        <h6 class="time">Waktu Mulai : {{ $details->waktu_mulai }}</h6>
                        <h6 class="time">Waktu Selesai : {{ $details->waktu_selesai }}</h6>
                        <p class="card-text">{{ $details->deskripsi }}</p>
                        
                    </div>
                </div>
            </div>
            @endforeach
            @endif 	
          </div>
        </div>
      </div>
    </div>
    </section>
@endsection