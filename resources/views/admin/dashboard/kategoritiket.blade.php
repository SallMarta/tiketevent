@extends('admin.layout')

@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-8">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
					<h2>Kategori Tiket</h2>
				</div>
				<div class="card-body table-responsive">
					<table class="table table-hover ">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Kategori</th>
								<th scope="col">Aksi</th>


							</tr>
						</thead>

						<tbody>

							@foreach($kategoritikets as $i => $kategoritiketall)
							<tr>
								<td scope="row">{{ $i + 1 }}</td>
								<td>{{ $kategoritiketall->nama }}</td>
								<td>
									<a type="button" class="btn btn-block mb-1 btn-primary mdi mdi-pencil" href="{{ ('/kategoritiket/'.$kategoritiketall->id .'/ubah') }}"> Ubah</a>
									<form action="{{ ('/hapuskategoritiket/'.$kategoritiketall->id) }}" method="post">
										@method('delete')
										@csrf
										<button type="submit" value="submit" class="btn btn-danger btn-block mdi mdi-delete">Hapus</button>
									</form>
								</td>
							</tr>

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
		



		<div class="col-lg-4">
			<div class="card card-default">
				<div class="card-header card-header-border-bottom">
					<h2>Tambah Kategori</h2>
				</div>
				<div class="card-body pb-0 pt-3">
					<form class="form" role="form" autocomplete="off" method="post" action="{{ url('/tambahkategoritiket') }}">
						@method('post')
						@csrf
						<div class="form-group">
							<label for="inputHarga">Nama Kategori</label>
							<input type="text" class="form-control" id="inputKategori" name="nama" placeholder="Masukkan Nama">
						</div>
						<div class="form-group" style="float:right;">
							<button type="submit" class="btn btn-success mdi mdi-plus">Tambah</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
