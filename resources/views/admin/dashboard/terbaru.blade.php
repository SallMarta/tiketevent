@extends('admin.layout')

@section('content')
<div class="content">

  <div class="row">
    <div class="col-lg-12">
      <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
          <h2>Terbaru</h2>
          <div class="date-range-report ">
            <span></span>
          </div>
        </div>
        <div class="card-body pt-0 pb-5">
          <table class="table card-table table-responsive table-responsive-large table-hover" style="width:100%">
            <thead>
              <tr>
                <th>Event ID</th>
                <th>Nama Event</th>
                <th class="d-none d-lg-table-cell">Kategori Event</th>
                <th class="d-none d-lg-table-cell">Jenis Event</th>
                <th class="d-none d-lg-table-cell">Dokumen</th>
                <th class="d-none d-lg-table-cell">Status</th>
                <th class="d-none d-lg-table-cell">Opsi</th>
              </tr>
            </thead>

            @foreach($events as $eventall)
            <tbody>
              <tr>
                <td >{{ $eventall->id }}</td>
                <td >
                  <a class="text-dark" href=""> {{ $eventall->nama_event }}</a>
                </td>
                <td class="d-none d-lg-table-cell">{{ $eventall->nama_kategorievent }}</td>
                <td class="d-none d-lg-table-cell">{{ $eventall->jenis_event }}</td>
                <td class="d-none d-lg-table-cell">
                  <a href="{{asset('/event/dokumen_event/' .$eventall->dokumen)}}" style="overflow: hidden; white-space: nowrap;text-overflow: ellipsis; width: 250px; display: block;">{{ $eventall->dokumen }}</a>
                </td>
                <td>
                  <span class="badge badge-warning">{{ $eventall->status }}</span>
                </td>
                <td class="text-right">
                  <div class="dropdown show d-inline-block widget-dropdown">

                    <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>

                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">

                      <li class="dropdown-item">
                        <a class="text-dark mdi mdi-eye" href="{{ url('/detail/' .$eventall->id .'/event') }}"> Lihat Detail</a>
                      </li>

                      <li class="dropdown-item">
                        <form action="{{ url('/konfirmasi/' .$eventall->id) }}" method="post">
                          @method('put')
                          @csrf
                          <button type="submit" class="mdi mdi-check text-success"> Konfirmasi</button>
                        </form>
                      </li>

                      <li class="dropdown-item">
                        <form action="{{ url('/tolak/' .$eventall->id) }}" method="post">
                          @method('put')
                          @csrf
                          <button type="submit" class="mdi mdi-close text-danger"> Tolak</button>
                        </form>
                      </li>
                    </ul>

                  </div>
                </td>
              </tr>

            </tbody>
            @endforeach

          </table>
        </div>
      </div>




    </div>
  </div>
</div>
@endsection