@extends('template.master')

@section('judulhalaman','Bartik')

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
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">ANTIK TERBARU</h2>
					</div>
				</div>
				<!-- section title -->

				@foreach($barang as $i)
				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<a href="/barang/{{$i->id}}"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Lihat</button></a>
							@foreach($gambar_barang as $j)
								@if($j->id_barang==$i->id)
									<img src="{!!asset('/gambar/')!!}/{{$j->nama_gambar}}" alt="" width="40px" height="300px">
									<?php break; ?>
								@endif
							@endforeach
						</div>
						<div class="product-body">
							<h3 class="product-price">Rp.{{$i->harga}}</h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="/barang/{{$i->id}}">{{$i->nama_barang}}</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<a href="/barang/{{$i->id}}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
				@endforeach
			</div>
			<!-- /row -->


			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection

@section('jstambahan')
<!-- ini adalah tempatnya JS Tambahan -->

@endsection
