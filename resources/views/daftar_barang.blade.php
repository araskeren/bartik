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
			<div class="" >
				<h3>Daftar Barang</h3>
			</div>
				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Jenis</th>
						<th>Harga</th>
						<th>Aksi</th>
					</tr>
						@php($gambar_barang=0)
					 @foreach($data_barang as $i)
					<tr>
						<td>{{$i->id}}</td>
						<td>{{$i->nama_barang}}</td>
						<td>{{$i->kategori}}</td>
						<td>{{$i->jenis}}</td>
						<td>Rp.{{$i->harga}}</td>
						<td>
							<form class="" action="/cektombol" method="post">
								{{csrf_field()}}
								<input type="hidden" name="id" value="{{$i->id}}">
								<button type="submit" class="btn-primary"name="tambah_gambar" value="1">Tambah Gambar</button>
								<button type="submit" class="btn-primary"name="lihat" value="1">Lihat</button>
								<button type="submit" class="btn-primary"name="ubah" value="1">Ubah</button>
	              <button type="submit" class="btn-danger"name="hapus" value="1">Hapus</button>

							</form>
						</td>
					</tr>
					@endforeach
				</table>
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
