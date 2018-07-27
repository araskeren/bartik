@extends('template.master')

@section('judulhalaman','Daftar Pembelian')

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
			<div class="">
				<h3>Daftar Pembelian <a href="/invoice/{{$pembelian[0]->no_invoice}}" class="btn btn-primary">Download Invoice</a></h3>
			</div>
			<div class="col-lg-6 col-md-4" >
				<table class="table table-stiped" >
				<tr>
					<td><b>Nama</b></td>
					<td>{{$transaksi->user_id->name}}</td>
				</tr>
				<tr>
					<td><b>No.invoice</b></td>
					<td>{{$transaksi->id}}</td>
				</tr>
				<tr>
					<td><b>Tanggal</b></td>
					<td>{{$transaksi->created_at}}</td>
				</tr>
				<tr>
					<td><b>Alamat</b></td>
					<td>{{$profil->alamat}}</td>
				</tr>
				<tr>
					<td><b>No Telpon</b></td>
					<td>{{$profil->no_telp}}</td>
				</tr>
			</table>
			</div>
			<br>
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>jumlah</th>
				</tr>

					@foreach($pembelian as $i)
					<tr>
						<td>#</td>
						<td>{{$i->barang->nama_barang}}</td>
						<td>{{$i->barang->harga}}</td>
						<td>1</td>
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
