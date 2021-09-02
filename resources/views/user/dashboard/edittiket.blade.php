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
         
          <form method="post" enctype="multipart/form-data" action="{{ url('/edit-tiket/'.$tiketevent->id) }}">
            @method('put')
            @csrf
            <div class="form-group">
                      <label for="inputHarga">Harga</label>
                      <input type="text" class="form-control" id="inputHarga" name="harga" placeholder="Harga" value="{{ $tiketevent->harga }}">
                    </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="inputKategoritiket">Kategori Tiket</label>
                      <select class="form-control" name="id_kategoritiket" placeholder="Kategori Tiket">
                      @foreach($kategoritikets as $kategoritiket)
                      <option value=" " disabled selected hidden>--Kategori Tiket--</option>
                        <option value="{{ $kategoritiket->id }}" {{ $kategoritiket->id == $tiketevent->id_kategoritiket ? 'selected' : '' }}>{{ $kategoritiket->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="inputQty">Banyak Tiket Dijual</label>
                      <input type="number" class="form-control" id="inputQty" name="qty" placeholder="Jumlah Tiket" value="{{ $tiketevent->qty }}">
                    </div>
                   
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputSalestart">Mulai Dijual</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-calendar-range"></i>
                          </span>
                        </div>
                        <input type="date" class="form-control date-range" name="sale_start" value="{{ $tiketevent->sale_start }}" placeholder="Date" />
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputSaleend">Selesai Dijual</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-calendar-range"></i>
                          </span>
                        </div>
                        <input type="date" class="form-control date-range" name="sale_end" value="{{ $tiketevent->sale_end }}" placeholder="Date" />
                      </div>
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
                        <input type="time" class="form-control date-range" name="waktu_mulai" value="{!! date('H:i', strtotime($tiketevent->waktu_mulai)) !!}" placeholder="Date" />
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
                        <input type="time" class="form-control date-range" name="waktu_selesai" value="{!! date('H:i', strtotime($tiketevent->waktu_selesai)) !!}" placeholder="Date" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputHarga">Deskripsi</label>
                      <input type="text" class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Deskripsi" value="{{ $tiketevent->deskripsi }}">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" style="float:right">Simpan</button>
          </form>
        
        </div>
      </div>
      @endsection