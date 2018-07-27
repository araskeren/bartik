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
				<h3>Daftar Pembelian </h3>
			</div>
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th>No INV</th>
					<th>Tanggal</th>
					<th>Pembeli</th>
					<th>Status Pembayaran</th>
					<th>Status Pemesanan</th>
					<th>No Resi</th>
				</tr>
				@foreach($pembelian as $i)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<form class="" action="daftarpembelian/invoice" method="post">
							<input type="hidden" name="id" value="{{$i->id}}">
							{{csrf_field()}}
							<button  class="btn btn-default" type="submit">{{$i->id}}</button>
						</form>
					</td>
					<td>{{$i->created_at}}</td>
					<td>{{$i->user_id->name}}</td>
					@if($i->status_pembayaran=='Belum Terbayar'&& Auth::user()->level==1)
					<td>
						<form class="" action="gantistatuspembayaran" method="post">
							<input type="hidden" name="id" value="{{$i->id}}">
							{{csrf_field()}}
							<input class="btn btn-primary" type="submit" name="status_pembayaran" value="Terbayar">
						</form>
					</td>
					@else
					<td>{{$i->status_pembayaran}}</td>
					@endif

					@if($i->status_pemesanan=='Belum diproses' && Auth::user()->level==1)
					<td>
						<form class="" action="gantistatuspemesanan" method="post">
							<input type="hidden" name="id" value="{{$i->id}}">
							{{csrf_field()}}
						<input class="btn btn-success"type="submit" name="pemesanan" value="Sudah diproses">
					</form>
					</td>
					@else
					<td>{{$i->status_pemesanan}}</td>
					@endif
					@if($i->no_resi=='Belum diproses'&& Auth::user()->level==1)
					<td>
						<form class="" action="gantistatusresi" method="post">
							<input type="hidden" name="id" value="{{$i->id}}">
							{{csrf_field()}}
						<input class="btn btn-danger"type="submit" name="resi" value="Sudah diproses">
					</form>
					</td>
					@else
					<td>{{$i->no_resi}}</td>
					@endif
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
