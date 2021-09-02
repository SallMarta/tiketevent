@extends('user.layouts')
@section('title', 'TukuTiket')
@section('content')
<!-- ticket section -->
<section class="ticket-section spad">
  <h1 class="text-center h1-ticket text-uppercase">Tiket Anda</h1>
  <div class="container-fluid">
    <div class="container col-md-6">
      <h4 class="mb-4">Detail Tiket yang anda beli</h4>
      <div class="card-ticket mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-6">
              <p>No. Pesanan: 001</p>
            </div>
            <div class="col-lg-6 text-right">
              <p>Tanggal Beli: </p>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h2 class="mb-3">{{ $detailtransaksi[0]->event }}</h2>
          <p class="card-text">Tanggal Event Mulai: {{ $detailtransaksi[0]->tanggal }}</p>
        </div>
          <table id="penjualan" class="table table-responsive">
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
                  <h3><span class="text-success">Total Harga : {{ $transaksi->sub_total_order }}</span></h3>
                </td>
              </tr>
            </tfoot>
            <tbody>
            @if(!$detailtransaksi->isEmpty())
            @foreach($detailtransaksi as $detail)
            <tr>
                <td>{{ $detail->nama_tiket }}</td>
                <td>
                  {{ $detail->qty }}
                </td>
                <td>
                  {{ $detail->harga }}
                </td>
                <td>
                  {{ $detail->qty * $detail->harga }}
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          <form method="post" action="{{-- url('/event/' .$eventdetail->id .'/') --}}" id="bayar">
          @method('patch')
          @csrf
          <div class="card-footer">
            <div class="row">
              <div class="col-lg-6">
                <p class="mb-0"> Masukan Total Harga</p>
                <input id="" type="" class="qty form-control" name="total_pembayaran" placeholder="Rp. ...,..">
              </div>
              <div class="col-lg-6 text-right">
                <button class="btn btn-success" style="float:right" value="submit" type="submit">Bayar</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- end ticket section -->
<script>

</script>
@endsection