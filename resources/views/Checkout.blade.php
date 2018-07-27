@extends('template.master')

@section('judulhalaman','Checkout')

@section('csstambahan')
<!-- ini adalah tempatnya CSS Tambahan -->

@endsection

@section('kontent')
	<!--Kontent/Koding Disini-->
<!-- section -->
<form class="form-horizontal" action="/transaksi" method="post">
<div class="section">
	<!-- container -->
	<div class="container">
		@if($profil==null)
		<h1>Silahkan Lengkapi Profile Anda Untuk Melanjutkan Ke Proses Checkout</h1>
		<a href="/profile" class="primary-btn">KLIK DISINI UNTUK KE HALAMAN PROFIL</a>
		@else
		<!-- row -->
		<div class="row">
			<div class="col-md-6">
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Detail</h3>
					</div>
					<table class="table">
						<tr>
							<td width='120px'>Nama</td>
							<td>:</td>
							<td>{{$profil->user_id->name}}</td>
						</tr>
						<tr>
							<td>Alamat Pengiriman</td>
							<td>:</td>
							<td>{{$profil->alamat}}</td>
						</tr>
						<tr>
							<td>No.Hp</td>
							<td>:</td>
							<td>{{$profil->no_telp}}</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="shiping-methods">
						<div class="section-title">
							<h4 class="title">Metode Pengiriman</h4>
						</div>
						<div class="input-checkbox">
							<div class="col-lg-4 form-group" style="margin-left: 1px;">
								<label for="kurir" class="col-sm-0 control-label">Kurir Pengiriman</label>
								<select class="form-control" name="kurir" id="kurir">
									@foreach($jasapengiriman as $i)
										<option value="{{$i->id}}">{{$i->jenis}} - {{$i->paket}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-4 form-group" style="margin-left: 8px;">
								<div class="form-group">
									<label for="ongkir">Ongkir:</label>
									<input type="text" class="form-control" id="ongkir" name="ongkir">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="payments-methods">
						<div class="section-title">
							<h4 class="title">Metode Pembayaran</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="pembayaran" id="payments-1" value="Transfer Bank" checked>
							<label for="payments-1">Transfer Bank</label>
							<div class="caption">
								<p>Silahkan Transfer ke rekening di bawah ini
									<ul>
										<li>BRI : 1230123921 - A.N Bla</li>
										<li>BNI : 1230123921 - A.N Bla</li>
									</ul>
								</p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="pembayaran" id="payments-2" value="Indomaret">
							<label for="payments-2">Indomaret</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="pembayaran" id="payments-3" value="Alfamart">
							<label for="payments-3">Alfamart</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Daftar Pembelian</h3>
					</div>
					<table class="shopping-cart-table table">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Kuantitas</th>
								<th class="text-center">Total</th>
								<th class="text-right"></th>
							</tr>
						</thead>
						<tbody>
							@php($subtotal=0)
							@php($id_penjual=null)
							@php($id=null)
							@foreach($cekout as $c)
							<tr>
								<td class="details">
									<a href="#">{{$c->barang->nama_barang}}</a>
									<p>{{$c->barang->deskripsi}}</p>
								</td>
								<td class="price text-center" ><strong>Rp.{{$c->barang->harga}}</strong><br><del class="font-weak"></del></td>
								<td class="qty text-center"><input class="input" type="number" value="{{$c->qty}}" readonly></td>
								@php($total=$c->barang->harga*$c->qty)
								<td class="total text-center"><strong class="primary-color" >Rp.{{$total}}</strong></td>
								<td class="text-right">
									<a href="/checkout/cancel/{{$c->id}}" class="main-btn icon-btn"><i class="fa fa-close"></i></a>
								</td>
							</tr>
							@php($subtotal+=$total)
							@php($id_penjual=$c->barang->id_penjual)
							@php($id=$c->id)
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>SUBTOTAL</th>
								<th colspan="2" class="sub-total" id="subtotal">Rp.{{$subtotal}}</th>
							</tr>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>Ongkir</th>
								<th colspan="2" class="sub-total" id="total_ongkir"></th>
							</tr>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>Biaya Admin</th>
								<td colspan="2" class="sub-total">Free</td>
							</tr>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>TOTAL</th>
								{{csrf_field()}}
								<input type="hidden" name="id" value="id">
								<th colspan="2" class="total" name="total_bayar" id="total_bayar" ></th>
							</tr>
						</tfoot>
					</table>
					<div class="pull-right">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{$id}}">
							<input type="hidden" name="total" id="total" value="">
							<input type="hidden" name="id_penjual" value="{{$id_penjual}}">
							<button type="submit" class="btn-primary"name="bayar" value="1">bayar sekarang</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
		@endif
	</div>
	<!-- /container -->
</div>
</form>
<!-- /section -->

@endsection

@section('jstambahan')
<!-- ini adalah tempatnya JS Tambahan -->
<script type="text/javascript">
$( "#kurir" ).change(function(){
	var value=$("#kurir").val();
	@foreach($jasapengiriman as $i)
		if(value=={{$i->id}}){
			var harga={{$i->harga_kilo}};
			$("#ongkir").val(harga);
			$("#total_ongkir").empty();
			$("#total_ongkir").append('Rp.'+harga);
			var subtotal=$("#subtotal").text().split('.')[1];
			var totalbayar=parseInt(subtotal)+parseInt(harga);
			$("#total_bayar").empty();
			$("#total_bayar").append('Rp.'+totalbayar);
			$("#total").val("");
			$("#total").val(totalbayar);
		}
	@endforeach
});
</script>
@endsection
