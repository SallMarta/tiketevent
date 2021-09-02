@extends('user.layouts')

@section('title', 'TukuTiket')

@section('content')
<!-- ticket section -->
  <section class="ticket-section spad">
    <h1 class="text-center h1-ticket text-uppercase">Tiket Anda</h1>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-lg-4">
          <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item nav-profile-2" role="presentation">
              <a class="btn btn-profile-nav p-3" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><span class="fas fa-list"></span> List Tiket Anda</a>
              <!-- <a class="btn btn-profile-nav p-3" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><span class="fas fa-tags"></span> Dimiliki</a>
              <a class="btn btn-profile-nav p-3" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><span class="fas fa-history"></span> Tiket Selesai</a> -->
            </li>
          </ul>
        </div>

        <div class="col-lg-6">
          <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="container">
                <h4 class="mb-4 text-center">Tiket yang anda miliki</h4>
                @if(!$transactions->isEmpty())
                @foreach($transactions as $transaksi)
                <div class="card-ticket mb-3">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-lg-6">
                        <p>{{ $transaksi->nama_tiket }}</p>
                      </div>
                      <div class="col-lg-6 text-right">
                        <p>Tanggal Beli: {{ $transaksi->waktu_order }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h2 class="mb-3">{{ $transaksi->nama_event }}</h2>
                    <p class="card-text">Tiket Berlaku: {{ $transaksi->waktu_mulai }}</p>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-lg-6">
                        <p class="btn-ticket-price-3"><span class="fas fa-history"></span> IDR {{ $transaksi->harga_tiket }}</p>
                      </div>
                      <div class="col-lg-6 text-right">
                        <a href="#" class="btn btn-ticket-detail"><span class="fas fa-eye"></span> Lihat Event</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif
              </div>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <div class="container">
                
              </div>
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <div class="container">
                <h4 class="mb-4">Riwayat tiket anda</h4>
                <div class="card-ticket mb-3">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-lg-6">
                        <p>No. Pesanan: 001</p>
                      </div>
                      <div class="col-lg-6 text-right">
                        <p>Tanggal Beli: 20-02-2020</p>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <h2 class="mb-3">Java Open Air</h2>
                    <p class="card-text">Tanggal Event Mulai: 20-02-2020</p>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-lg-6">
                        <p class="btn-ticket-price-3"><span class="fas fa-history"></span> IDR 250.000</p>
                      </div>
                      <div class="col-lg-6 text-right">
                        <a href="#" class="btn btn-ticket-detail"><span class="fas fa-eye"></span> Lihat Event</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- end ticket section -->
  @endsection