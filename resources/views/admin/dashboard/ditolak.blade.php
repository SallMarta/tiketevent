@extends('admin.layout')

@section('content')
<div class="content">
  <div class="row">
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4">
                        <div class="card-body">
                          <h2 class="mb-1">71,503</h2>
                          <p>Event di Promosikan</p>
                          <!-- <div class="chartjs-wrapper">
                            <canvas id="barChart"></canvas>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                      <div class="card card-mini mb-4">
                        <div class="card-body">
                          <h2 class="mb-1">71,503</h2>
                          <p>Tiket Terjual</p>
                          <!-- <div class="chartjs-wrapper">
                            <canvas id="barChart"></canvas>
                          </div> -->
                        </div>
                      </div>
                    </div>
  </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                      <h2>Ditolak</h2>
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
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        @if(!$events->isEmpty())
                        @foreach($events as $eventall)
                        <tbody>
                          <tr>
                            <td >{{ $eventall->id }}</td>
                            <td >
                              <a class="text-dark" href="{{ url('/detail/' .$eventall->id .'/event') }}" style="overflow: hidden; white-space: nowrap;text-overflow: ellipsis; width: 250px; display: block;"> {{ $eventall->nama_event }}</a>
                            </td>
                            <td class="d-none d-lg-table-cell">{{ $eventall->nama_kategorievent }}</td>
                            <td class="d-none d-lg-table-cell">{{ $eventall->jenis_event }}</td>
                            <td class="d-none d-lg-table-cell">
                              <a href="{{asset('/event/dokumen/' .$eventall->dokumen)}}" style="overflow: hidden; white-space: nowrap;text-overflow: ellipsis; width: 175px; display: block;">{{ $eventall->dokumen }}</a>
                            </td>
                            <td >
                              <span class="badge badge-danger">{{ $eventall->status }}</span>
                            </td>
                            <td class="text-right">
                              <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                  <li class="dropdown-item">
                                    <a href="{{ url('/detail/' .$eventall->id .'/event') }}">Lihat Detail</a>
                                  </li>
                                 
                                </ul>
                              </div>
                            </td>
                          </tr>
                          
                        </tbody>
                        @endforeach
                        @endif
                      </table>
                    </div>
                  </div>



                  <!-- <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                      <h2>Terkonfirmasi</h2>
                      <div class="date-range-report ">
                        <span></span>
                      </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>Event ID</th>
                            <th>Nama Event</th>
                            <th class="d-none d-lg-table-cell">Kategori Event</th>
                            <th class="d-none d-lg-table-cell">Jenis Event</th>
                            <th class="d-none d-lg-table-cell">Dokumen</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >24541</td>
                            <td >
                              <a class="text-dark" href=""> Coach Swagger</a>
                            </td>
                            <td class="d-none d-lg-table-cell">1 Unit</td>
                            <td class="d-none d-lg-table-cell">Oct 20, 2018</td>
                            <td class="d-none d-lg-table-cell">$230</td>
                            <td >
                              <span class="badge badge-success">Diterima</span>
                            </td>
                            <td class="text-right">
                              <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                  <li class="dropdown-item">
                                    <a href="#">Lihat Detail</a>
                                  </li>
                                  <li class="dropdown-item">
                                    <a href="#">Konfirmasi</a>
                                  </li>
                                  <li class="dropdown-item">
                                    <a href="#">Tolak</a>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>




                  <div class="card card-table-border-none" id="recent-orders">
                    <div class="card-header justify-content-between">
                      <h2>Ditolak</h2>
                      <div class="date-range-report ">
                        <span></span>
                      </div>
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>Event ID</th>
                            <th>Nama Event</th>
                            <th class="d-none d-lg-table-cell">Kategori Event</th>
                            <th class="d-none d-lg-table-cell">Jenis Event</th>
                            <th class="d-none d-lg-table-cell">Dokumen</th>
                            <th>Status</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >24541</td>
                            <td >
                              <a class="text-dark" href=""> Coach Swagger</a>
                            </td>
                            <td class="d-none d-lg-table-cell">1 Unit</td>
                            <td class="d-none d-lg-table-cell">Oct 20, 2018</td>
                            <td class="d-none d-lg-table-cell">$230</td>
                            <td >
                              <span class="badge badge-danger">Ditolak</span>
                            </td>
                            <td class="text-right">
                              <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                  <li class="dropdown-item">
                                    <a href="#">Lihat Detail</a>
                                  </li>
                                  <li class="dropdown-item">
                                    <a href="#">Konfirmasi</a>
                                  </li>
                                  <li class="dropdown-item">
                                    <a href="#">Tolak</a>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div> -->
        </div>
    </div>
</div>
@endsection