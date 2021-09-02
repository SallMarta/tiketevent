@extends('user.dashboard.layout')

@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-default p-5">
        <div class="card-header card-header-border-bottom">
          <div class="row col-10"><h2>Tiket Event</h2></div>
          <div class="col-2">
            <button style="float:right" type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#tiketModalForm"> Buat Tiket </button>
          </div>
        </div>

        <section class="detail-event-section mt-5 mb-5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-sm-12 text-center mb-4">
                <img src="{{asset('/event/poster_event/' .$eventpemilik->poster_event)}}" class="img-detail-events">
                <p class="mt-5">{{ $eventpemilik->deskripsi }}</p>
              </div>
              <div class="col-md-12 col-lg-6 col-sm-12">
                <h1 class="text-center event-detail-title mb-4">{{ $eventpemilik->nama_event }}</h1>
                <!-- <h4 class="text-center mb-5">Fear The Fest</h4> -->

                <ul class="nav nav-tabs justify-content-left" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link nav-detail active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true"><span class="fas fa-bookmark"></span> Detail</a>
                  </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active mt-4 mb-1" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                    <p class="by-user"><span class="fas fa-user-circle"></span> Pengupload :<a href="userprofile.html" class="by-user"> {{ $eventpemilik->nama_pemilik }}</a> </p>
                    <p>Kategori Event: {{ $eventpemilik->nama_kategorievent }}</p>
                    <p><span class="fas fa-calendar-day"></span> {{ $eventpemilik->tanggal_mulai }}</p>
                    <p><span class="fas fa-map-marker-alt"></span> {{ $eventpemilik->nama_tempat }}</p>
                    <!-- <p><span class="fas fa-clock"></span> 17.00 s/d 23.00</p> -->
                  </div>

                  @if(!$tiketevent->isEmpty())
                  @foreach($tiketevent as $tiket)
                  <div class="row">
                    <div class=" card-ticket col-md-12 mb-3">
                      <div class="container mt-4 mb-4">
                        <h3 class="card-title">{{ $tiket->id_kategoritiket}}</h3>
                        <h4 class="card-subtitle">Stok : {{ $tiket->qty }} | Harga : {{ $tiket->harga }}</h4>
                        <h6 class="time">Waktu Mulai : {{ $tiket->waktu_mulai }}</h6>
                        <h6 class="time">Waktu Selesai : {{ $tiket->waktu_selesai }}</h6>
                        <p class="card-text">{{ $tiket->deskripsi }}</p>

                        <div class="button-ticket-event mt-2">
                          <a type="button" class="btn btn-sm btn-block btn-primary mb-1" href="{{ url('/ubah/' .$tiket->id .'/tiket') }}">Ubah</a>
                          <form method="post" action="{{ url('/hapus/' .$tiket->id .'/tiket') }}">
                            @method('delete')
                            @csrf
                            <button type="submit" value="submit" class="btn btn-sm btn-block btn-danger" onclick="return confirm('Anda yakin ingin menghapus tiket?')">Hapus</button>
                          </form>
                        </div>

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

        <!-- Form Modal -->
        <div class="modal fade" id="tiketModalForm" tabindex="-1" role="dialog" aria-labelledby="tiketModalFormTitle" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalFormTitle">Form Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="tiketpost" method="post" action="{{ url('/show-event/' .$eventpemilik->id .'/detail') }}" enctype="multipart/form-data">
                  @method('post')
                  @csrf
                  <div class="form-group">
                    <label for="inputHarga">Harga</label>
                    <input type="number" class="form-control" id="inputHarga" name="harga" placeholder="Harga">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="inputKategoritiket">Kategori Tiket</label>
                      <select class="form-control" name="id_kategoritiket" placeholder="Kategori Tiket" value="">
                        @foreach($kategoritikets as $kategoritiket)
                        <option value=" " disabled selected hidden>--Kategori Tiket--</option>
                        <option value="{{ $kategoritiket->id }}">{{ $kategoritiket->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputSalestart">Tanggal Berlaku Tiket</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control date-range" name="tanggal_tiket" value="" placeholder="Date" />
                        </div>
                      </div>
                    <div class="form-group col-md-3">
                      <label for="inputQty">Banyak Tiket</label>
                      <input type="number" class="form-control" id="inputQty" name="qty" placeholder="Jumlah Tiket">
                    </div>
                  </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputWaktumulai">Waktu Mulai</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="time" class="form-control date-range" name="waktu_mulai" value="" placeholder="Date" />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputWaktuakhir">Waktu Akhir</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="time" class="form-control date-range" name="waktu_selesai" value="" placeholder="Date" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputDeskripsi">Deskripsi</label>
                      <textarea type="text" class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End Form Modal -->
      </div>
    </div>
  </div>
</div>
@endsection