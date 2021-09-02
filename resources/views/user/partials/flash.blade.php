<div class="col-lg-9">
          <div class="row">
           
            <!-- <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
          <div class="card card-1">
            <div class="card-info-hover">
              <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
            </div>
            <div class="card-img"></div>
            <a data-toggle="modal" data-target="#staticBackdrop">
              <div class="card-img-hover" >
                <p class="card-time"><span class="fas fa-calendar-day"></span> </p>
              </div>
            </a>
            <div class="card-info">
              <span class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase"></span></span>
              <a data-toggle="modal" data-target="#staticBackdrop"class="card-title d-inline-block"></a>
              <p class="card-location"><span class="fas fa-map-marker-alt"></span> </p>
              <span class="card-category d-inline-block text-uppercase"> Kategori: </span>
              <a data-toggle="modal" data-target="#staticBackdrop" class="card-more">Lihat detail</a>
            </div>
          </div>
        </div> -->


            @if(!$eventall->isEmpty())
            @foreach($eventall as $event)
            <div data-toggle="modal" data-target="#staticBackdrop" class="col-lg-4 mb-5 col-sm-6 col-md-6 ">
              <div class="card card-all card-1">
                <div class="card-info-hover">
                  <p class="card-more-hover"><span class="fas fa-info-circle"></span> Lihat detail</p>
                </div>
                <div class="card-img"></div>
                <a data-toggle="modal" data-target="#staticBackdrop">
                  <div class="card-img-hover" style="background-image: url({{asset('event/poster_event/'.$event->poster_event)}});">
                    <p class="card-time"><span class="fas fa-calendar-day"></span> {{ $event->tanggal_mulai }}</p>
                  </div>
                </a>
                <div class="card-info">
                  <span data-toggle="modal" data-target="#staticBackdrop" class="card-price-2 d-inline-block">Tiket IDR: <span class="card-price d-inline-block text-uppercase">{{ $event->harga_min }} - {{ $event->harga_max }}</span></span>
                  <a data-toggle="modal" data-target="#staticBackdrop" class="card-title d-inline-block">{{ $event->nama_event }}</a>
                  <p class="card-location"><span class="fas fa-map-marker-alt"></span> {{ $event->nama_tempat }}</p>
                  <span class="card-category d-inline-block text-uppercase"> Kategori: {{ $event->nama_kategorievent }}</span>
                  <a data-toggle="modal" data-target="#staticBackdrop" class="card-more">Lihat detail</a>
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

  <!-- Modal choose event-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row mb-2">
              <div class="col-lg-12">
                <button type="button" class="close mb-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 text-center">
                <img src="img/javaopen.jpeg" class="img-modal-ticket">
              </div>
              <div class="col-lg-8 text-center">
                
                <h1 class="text-center">{{-- $modalevent->eventnama --}}</h1>
                <!-- <h4 class="text-center">Fear The Fest</h4> -->
                <p class="text-center mb-4">{{-- $modalevent->tanggal --}}</p>
                

                @if(!$tiketevent->isEmpty())
                @foreach($tiketevent as $eventtiket)
                <button class="btn btn-buy-now mb-2 d-block w-100 text-uppercase" type="submit">{{ $eventtiket->nama_kategoritiket }}</button>
                <!-- <button class="btn btn-buy-now mb-2 d-block w-100 text-uppercase" type="submit">Presale 2</button> -->
                <!-- <button class="btn btn-buy-now mb-2 d-block w-100 text-uppercase" type="submit">presale 3</button> -->
                @endforeach
                @endif
                <i>*Klik jenis tiket untuk melihat detail info event</i>
                <div class="modal-footer mt-3">
                  <button type="button" class="btn btn-buy-cancel text-uppercase" data-dismiss="modal">Batal</button>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end choose event modal -->


    $eventall = DB::table('event')
                    ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')            
                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                    // ->join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                    ->select(DB::raw('event.*, MIN(tiket.harga) AS harga_min, MAX(tiket.harga) AS harga_max, kategorievent.nama AS nama_kategorievent'))
                    ->where('status', 'Terkonfirmasi')
                    ->groupBy('event.id')
                    ->orderBy('event.id', 'desc')
                    ->paginate(3);
                    // ->get(
        
        $tiketevent = DB::table('event')
                    ->leftjoin('tiket', 'event.id', '=', 'tiket.id_event')            
                    ->join('kategorievent', 'event.id_kategorievent', '=', 'kategorievent.id')
                    ->join('kategoritiket', 'tiket.id_kategoritiket', '=', 'kategoritiket.id')
                    ->select(DB::raw('event.*, MIN(tiket.harga) AS harga_min, MAX(tiket.harga) AS harga_max, kategorievent.nama AS nama_kategorievent, kategoritiket.nama AS nama_kategoritiket'))
                    ->where('status', 'Terkonfirmasi')
                    ->groupBy('event.id')
                    ->orderBy('event.id', 'desc')
                    ->get();