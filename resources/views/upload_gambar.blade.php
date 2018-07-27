@extends('template.master')

@section('judulhalaman','Daftar Barang')

@section('csstambahan')
<!-- ini adalah tempatnya CSS Tambahan -->

@endsection

@section('kontent')
	<!--Kontent/Koding Disini-->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Koding disini -->
			<div class="col-xs-12 col-md-6 col-lg-6">
				<h3>Upload File</h3>
				<form class="" action="/tambah_gambar" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="id_barang" value="{{$id_barang}}">
					<div class="form-group">
						 <label for="gambar" class="col-sm-3 control-label">Gambar</label>
						 <div class="col-md-6">
							 <input type="file" class="form-control" id="gambar" name="gambar">
						 </div>
					 </div>
					 <button type="submit" name="button">Tambah Gambar</button>
				</form>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<h3>Daftar Gambar</h3>
				<table class="table table-striped">
					<tr>
						<th>Nama File</th>
						<th>Aksi</th>
					</tr>
					@foreach($gambar_barang as $i)
					<tr>
						<td>{{$i->nama_gambar}}</td>
						<td>
							<form class="" action="/cektombolgambar" method="post">
								{{csrf_field()}}
								<input type="hidden" name="id_barang" value="{{$id_barang}}">
								<input type="hidden" name="nama_gambar" value="{{$i->nama_gambar}}">
								<button type="submit" name="lihat" value="1">Lihat</button>
								<button type="submit" name="delete" value="1">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

@endsection

@section('jstambahan')
<!-- ini adalah tempatnya JS Tambahan -->

@endsection
