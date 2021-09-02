@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Kategori</h2>
                </div>
                <div class="card-body pb-0 pt-3">
                    <form method="post" action="{{ url('/kategorievent/' .$kategorievent->id) }}">
						@method('put')
                  		@csrf
						<div class="form-group">
							<label for="inputHarga">Nama Kategori</label>
							<input type="text" class="form-control" id="inputKategori" name="nama" placeholder="Masukan Nama" value="{{ $kategorievent->nama }}">
						</div>
						<div class="form-group" style="float:right;">
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</form>
                </div>
            </div>
        </div>




        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Kategori Event</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover ">
												<thead>
													<tr>
														<th scope="col">#</th>
														<th scope="col">Nama Kategori</th>
														<th class="colspan-2" scope="col">Aksi</th>
														
													</tr>
												</thead>
                        						
												<tbody>
												
												@foreach($kategorievents as $i => $kategorieventall)
													<tr>
														<td scope="row">{{ $i + 1 }}</td>
														<td>{{ $kategorieventall->nama }}</td>
													</tr>
													
												@endforeach
												
												</tbody>
											</table>
                </div>
            </div>
		</div>
		
    </div>
</div>
@endsection
