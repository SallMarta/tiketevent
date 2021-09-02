@extends('user.layouts')

@section('title', 'TukuTiket')

@section('content')
<!--profile user-->
  <div class="container-fluid spad">
    <div class="row">

      <div class="col-sm-6 col-lg-6 col-md-6 text-center">
        <div class="row">
          <div class="col-md-12">
            <img src="{{asset('/bahanuser/img/user.png')}}" alt="" class="profilepic rounded-circle"/>
          </div>
          <div class="col-md-12">
            <a href="{{ url('/editprofile') }}" class="btn btn-edit"><span class="fas fa-edit"></span> Edit Profile</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 col-md-6 profile-detail">
        <h4>{{ auth()->user()->name }}</h4>
        <p>{{ auth()->user()->email }}</p>
        @if(!empty( auth()->user->jenis_kelamin))
        <span class="fas fa-venus-mars"></span><span> Jenis Kelamin :</span>
        @endif
        <p> </p>
      </div>
      <!-- <div class="col-sm-12 col-lg-12 col-md-12 mt-5">
        <div class="container-fluid">

          <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item nav-profile" role="presentation">
              <a class="btn btn-profile-nav p-3" id="pills-home-tab" data-toggle="pill" href="#pills-event-dibuat" role="tab" aria-controls="pills-event-dibuat" aria-selected="true"><span class="fas fa-calendar-alt"></span> Event Dibuat</a>
              <a class="btn btn-profile-nav p-3" id="pills-profile-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><span class="fas fa-history"></span> Histori Event</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-event-dibuat" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="text-center mb-4">
                <h3 class="text-uppercase">Event yang anda buat</h3>
              </div>
              <div class="text-center mb-4">
                <h5 class="text-danger text-uppercase">anda belum pernah membuat event</h5>
              </div>

              <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
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
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
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
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
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
                <div class="col-lg-3 col-md-6 col-sm-6 mb-5">
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
              </div>
            </div>

            <div class="tab-pane fade text-center" id="pills-2" role="tabpanel" aria-labelledby="pills-profile-tab">

              <div class="text-center mb-4">
                <h3 class="text-uppercase">histori event anda</h3>
              </div>

              <div class="text-center mb-4">
                <h5 class="text-danger text-uppercase">anda belum pernah mengunjungi event apapun</h5>
              </div>

            </div>

          </div>

        </div>
      </div> -->
    </div>
  </div>
  <!--end profile user-->
  @endsection