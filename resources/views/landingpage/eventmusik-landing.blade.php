@extends('landingpage.layout-landing')

@section('title', 'TukuTiket')

@section('content')
<!-- detail event -->
<section class="detail-event-section mt-5 mb-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-sm-12 text-center mb-4">
        <img src="{{asset('/event/poster_event/' .$detailmusik->poster_event)}}" class="img-detail-event">
      </div>
      <div class="col-md-12 col-lg-6 col-sm-12">
        <h1 class="text-center event-detail-title">{{ $detailmusik->nama_event }}</h1>
        <!-- <h4 class="text-center mb-5">Fear The Fest</h4> -->
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-detail active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true"><span class="fas fa-bookmark"></span> Deskripsi</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-detail" id="tiket-tab" data-toggle="tab" href="#tikettab" role="tab" aria-controls="tikettab" aria-selected="false"><span class="fas fa-ticket-alt"></span> Tiket</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-detail" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><span class="fas fa-address-book"></span> Contact Person</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link nav-detail" id="rules-tab" data-toggle="tab" href="#rules" role="tab" aria-controls="rules" aria-selected="false"><span class="fas fa-file-alt"></span> Peraturan Event</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active mt-4" id="detail" role="tabpanel" aria-labelledby="detail-tab">
            <!-- <p class="by-user"><span class="fas fa-user-circle"></span> Pengupload <a href="userprofile.html" class="by-user"> @rizkiimoet</a> </p> -->
            <p>Kategori Event: {{ $detailmusik->nama_kategorievent }}</p>
            <p><span class="fas fa-calendar-day"></span> {{ date('j-F-Y', strtotime($detailmusik->tanggal_mulai)) }}</p>
            <p><span class="fas fa-map-marker-alt"></span> {{ $detailmusik->nama_tempat }}, {{ $detailmusik->alamat_event }}</p>
            <!-- <p><span class="fas fa-clock"></span> 17.00 s/d 23.00</p> -->
            <p class="mt-5">{{ $detailmusik->deskripsi }}</p>
            <div class="row">
              <div class="col-lg-12">
                <!--carousel-->
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100 carousel-img-2" src="{{asset('/bahanuser/img/musik.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item ci-2">
                      <img class="d-block w-100 carousel-img-2" src="{{asset('/bahanuser/img/meeting.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item ci-2">
                      <img class="d-block w-100 carousel-img-2" src="{{asset('/bahanuser/img/tari.jpg')}}" alt="Third slide">
                    </div>
                  </div>
                </div>
                <!--end carousel-->
              </div>
            </div>
          </div>
          <div class="tab-pane fade mt-4" id="tikettab" role="tabpanel" aria-labelledby="tiket-tab">
          <!-- <div class="container">
              <h2 class="text-center mb-4 ticket-sale-category">
                <p class="mt-2">Tersisa 500 Tiket</p>
              </h2>
              <h2 class="text-center mb-5">Harga Tiket IDR <span class="ticket-price">/Tiket</span></h2>
            </div> -->
            <div class="row">
              <div class="col-md-5 col-sm-5 offline">
                <h3 class="text-uppercase">tiket offline</h3>
                <p>Tiket offline bisa didapatkan di:</p>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><span class="fas fa-map-marker-alt"></span> Silol Kopi & Eatery</li>
                  <li class="list-group-item"><span class="fas fa-map-marker-alt"></span> Marisini Kopi</li>
                  <li class="list-group-item"><span class="fas fa-map-marker-alt"></span> Indomaret</li>
                  <li class="list-group-item"><span class="fas fa-map-marker-alt"></span> Alfamart</li>
                  <li class="list-group-item"><span class="fas fa-map-marker-alt"></span> banyak lah</li>
                </ul>
              </div>
              <div class="col-md-7 col-sm-7 online">
                <h3 class="text-uppercase">tiket online</h3>
                <div class="">
                  <table id="penjualan" class="table table-responsive table-hover">
                    <thead>
                      <tr>
                        <th>Kategori/Jenis Tiket</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th align="center"><span id="amount" class="amount">Subtotal</span></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <td colspan="2"></td>
                        <td align="right">
                          <h3><span id="total" class="total text-success">Grand Total</span></h3>
                        </td>
                      </tr>
                    </tfoot>
                    @if(!$tikets->isEmpty())
                    @foreach($tikets as $tiket)
                    <tbody>
                      <tr>
                        <td>{{ $tiket->nama_kategoritiket }}</td>
                        <td>
                        <!-- <div value="" class="form-group">
          <input type="text" class="qty form-control" id="inputQty" name="qty" placeholder="Qty">
        </div> -->
                          <select value="" name="qty" class="qty form-control">
                            <option value="">{{ $tiket->qty }}</option>
                          </select>
                        </td>
                        <td>
                          <input type="text" value="{{ $tiket->harga }}" class="price form-control" disabled="true">
                        </td>
                        <td align="center">
                          <h4><span id="amount" class="amount">Rp. 0</span></h4>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                    @endif
                  </table>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 mt-4 onthespot">
                <h3 class="text-uppercase text-center">tiket on the spot</h3>
                <div class="text-center">
                  <p>Tersedia <span class="fas fa-check-circle text-success"></span> IDR 400.000</p>
                  <p>Tidak Tersedia <span class="fas fa-times-circle text-danger"></span></p>
                </div>
              </div>
              <!-- Modal Onine Ticket-->
            </div>
          </div>
          <div class="tab-pane fade mt-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <p><span class="fas fa-phone"></span> +628 1234 578</p>
            <p><span class="fab fa-whatsapp"></span> +628 1234 578</p>
            <p><span class="fab fa-line"></span> +628 1234 578</p>
            <p><span class="fab fa-instagram"></span> @abcdefg</p>
            <p><span class="fab fa-twitter"></span> @abcdefg</p>
            <p><span class="fas fa-envelope"></span> a@a.com</p>
            <p><span class="fab fa-facebook"></span></p>
          </div>
          <div class="tab-pane fade mt-4" id="rules" role="tabpanel" aria-labelledby="rules-tab">
            <p>{{ $detailmusik->syarat_ketentuan }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end detail event -->
@endsection