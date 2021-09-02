@extends('user.dashboard.layout')
@section('content')

<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <div class="row col-10">
            <h2>Tabel Event</h2>
          </div>
          <div class="col-2">
            <button style="float:right" type="button" class="btn btn-info btn-pill" data-toggle="modal" data-target="#exampleModalForm"> Buat Event </button>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            @if(!$eventpemilik->isEmpty())
            @foreach($eventpemilik as $event)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 accordion" id="accordionExample">
              <div class="tile">

                <div class="header">
                  {{ $event->nama_event }}
                </div>

                <div class="banner-img">
                  <img src="{{asset('event/poster_event/'.$event->poster_event)}}" alt="" width="300" height="200">
                  <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                  </div>
                </div>

                <div class="dates">
                  <div class="start">
                    <strong>Event Mulai</strong>
                    {{ $event->tanggal_mulai }}
                    <span></span>
                  </div>
                  <div class="ends">
                    <strong>Event Selesai</strong>
                    {{ $event->tanggal_selesai }}
                  </div>
                </div>
                
                <div class="footer">
                  <div class="row">
                    <div class="col-md-12 mb-2 col-lg-12">
                      <a type="button" href="{{ url('/show-event/' .$event->id .'/detail') }}" class="btn btn-block btn-primary mdi mdi-eye"> Lihat Detail</a>
                    </div>
                    <div class="col-md-12 mb-2 col-lg-12">
                      <a type="button" href="{{ url('/show-event/' .$event->id .'/edit') }}" class="btn btn-block btn-primary mdi mdi-pencil"> Ubah</a>
                    </div>
                    <div class="col-md-12 col-lg-12">
                      <form method="post" action="{{ url('/show-event/' .$event->id .'/hapus') }}">
                        @method('delete')
                        @csrf
                        <button type="submit" value="submit" class="btn btn-block btn-danger mdi mdi-delete"> Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            @endforeach
            @endif
          </div>

          <!-- Form Modal Buat Event -->
          <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalFormTitle">Formulir Pendaftaran Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <p class="mb-3 text">Silahkan lengkapi semua data di bawah ini.</p>
                  <form id="eventpost" method="post" action="{{--url('/show-event')--}}" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="form-group">
                      <label for="inputEvent">Nama Event</label>
                      <input type="text" class="form-control" id="inputEvent" name="nama_event" placeholder="Nama Event">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputKategori">Kategori Event</label>
                        <select class="form-control" name="id_kategorievent" placeholder="Kategori Event" value="">
                          @foreach($kategorievents as $kategorievent)
                          <option value=" " disabled selected hidden>--Kategori Event--</option>
                          <option value="{{ $kategorievent->id }}">{{ $kategorievent->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPoster">Poster</label>
                        <div class="file-select">
                          <input type="file" class="form-control" name="poster_event" id="inputPoster">
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputVenue">Foto Venue</label>
                        <input type="file" class="form-control" name="foto_venue" id="inputVenue">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputDokumen">Dokumen/Proposal</label>
                      <input type="file" class="form-control" id="inputDokumen" name="dokumen" placeholder="Dokumen/Proposal">
                    </div>
                    <div class="form-group">
                      <label for="inputTempat">Nama Tempat</label>
                      <input type="text" class="form-control" id="inputTempat" name="nama_tempat" placeholder="Nama gedung atau lokasi event">
                    </div>
                    <div class="form-group">
                      <label for="inputAlamat">Alamat</label>
                      <input type="text" class="form-control" id="inputAlamat" name="alamat_event" placeholder="Alamat lengkap daerah diadakannya event">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="firstName">Tanggal Mulai</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control date-range" name="tanggal_mulai" value="" placeholder="Date" />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="firstName">Tanggal Selesai</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control date-range" name="tanggal_selesai" value="" placeholder="Date" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputJenis">Jenis Event</label>
                      <input type="text" class="form-control" id="inputJenis" name="jenis_event" placeholder="Jenis Event">
                    </div>
                    <div class="form-group">
                      <label for="inputNpwp">Foto NPWP</label>
                      <input type="file" class="form-control" id="inputNpwp" name="npwp" placeholder="NPWP">
                    </div>
                    <!-- <div class="group-input">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque alias quam minus culpa laudantium in rem, blanditiis dolorem, incidunt possimus fugit tempora. Blanditiis molestias magnam odit reprehenderit cum eius neque?</textarea>
              </div> -->

                    <div class="form-group">
                      <label for="inputDeskripsi">Deskripsi</label>
                      <textarea type="text" class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi Event Anda"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="inputSayarat">Syarat & Ketentuan</label>
                      <textarea type="text" class="form-control" id="inputSyarat" name="syarat_ketentuan" placeholder="Syarat & Ketentuan Event Anda"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float:right">Buat Event Sekarang!</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- end modal -->

        </div>
      </div>
    </div>
  </div>
</div>

@endsection