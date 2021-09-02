@extends('user.dashboard.layout')
@section('content')
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Basic Validation</h2>
        </div>
        <div class="card-body">
         
          <form method="post" enctype="multipart/form-data" action="{{ url('/edit-event/' .$eventpemilik->id) }}">
                  @method('put')
                  @csrf
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="inputEvent">Nama Event</label>
                <input type="text" class="form-control" id="inputEvent" name="nama_event" value="{{ $eventpemilik->nama_event }}">
                
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputKategori">Kategori Event</label>
                        <select class="form-control" name="id_kategorievent" placeholder="Kategori Event" value="">
                            @foreach($kategorievents as $kategorievent)
                            <option value=" " disabled selected hidden>--Kategori Event--</option>
                          <option value="{{ $kategorievent->id }}" {{ $kategorievent->id == $eventpemilik->id_kategorievent ? 'selected' : '' }}>{{ $kategorievent->nama }}</option>
                          @endforeach
                        </select>
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputPoster">Poster</label>
                        <div class="file-select">
                          <input type="file" class="form-control" name="poster_event" id="inputPoster" value="{{asset('event/poster_event/'.$eventpemilik->poster_event)}}">
                        </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputVenue">Foto Venue</label>
                        <div class="file-select">
                          <input type="file" class="form-control" name="foto_venue" id="inputVenue" value="{{asset('event/foto_venue/'.$eventpemilik->foto_venue)}}">
                        </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputDokumen">Dokumen</label>
                        <div class="file-select">
                          <input type="file" class="form-control" name="dokumen" id="inputDokumen" value="{{asset('event/dokumen/'.$eventpemilik->dokumen)}}">
                        </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputTempat">Nama Tempat</label>
                      <input type="text" class="form-control" id="inputTempat" name="nama_tempat" placeholder="Nama gedung atau lokasi event" value="{{ $eventpemilik->nama_tempat }}">
                
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputAlamat">Alamat</label>
                      <input type="text" class="form-control" id="inputAlamat" name="alamat_event" placeholder="Alamat lengkap daerah diadakannya event" value="{{ $eventpemilik->alamat_event }}"> 
              </div>
              <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="tanggalMulai">Tanggal Mulai</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control date-range" name="tanggal_mulai" value="{{ $eventpemilik->tanggal_mulai }}" placeholder="Date" />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="tanggalSelesai">Tanggal Selesai</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="mdi mdi-calendar-range"></i>
                            </span>
                          </div>
                          <input type="date" class="form-control date-range" name="tanggal_selesai" value="{{ $eventpemilik->tanggal_selesai }}" placeholder="Date" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                <label for="inputJenis">Jenis Event</label>
                      <input type="text" class="form-control" id="inputJenis" name="jenis_event" placeholder="Jenis Event" value="{{ $eventpemilik->jenis_event }}">
              </div>
                    <div class="col-md-12 mb-3">
                <label for="inputNpwp">NPWP</label>
                        <div class="file-select">
                          <input type="file" class="form-control" name="npwp" id="inputNpwp" value="{{asset('event/npwp/'.$eventpemilik->npwp)}}">
                        </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputDeskripsi">Deskripsi</label>
                      <input type="text" class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi" value="{{ $eventpemilik->deskripsi }}">
              </div>
              <div class="col-md-12 mb-3">
                <label for="inputSayarat">Syarat Ketentuan</label>
                      <input type="text" class="form-control" id="inputSyarat" name="syarat_ketentuan" placeholder="Syarat Ketentuan" value="{{ $eventpemilik->syarat_ketentuan }}">
              </div>

            </div>
            <!-- <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationServer03">City</label>
                <input type="text" class="form-control" id="validationServer03" placeholder="City" required>
                <div class="invalid-feedback"> Please provide a valid city. </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationServer04">State</label>
                <input type="text" class="form-control" id="validationServer04" placeholder="State" required>
                <div class="invalid-feedback"> Please provide a valid state. </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationServer05">Zip</label>
                <input type="text" class="form-control" id="validationServer05" placeholder="Zip" required>
                <div class="invalid-feedback"> Please provide a valid zip. </div>
              </div>
            </div> -->
            <button class="btn btn-primary" type="submit">Simpan</button>
          </form>
        
        </div>
      </div>
      @endsection