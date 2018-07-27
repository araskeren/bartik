@extends('template.master')

@section('judulhalaman','Halaman Produk')

@section('csstambahan')
<!-- ini adalah tempatnya CSS Tambahan -->

@endsection

@section('kontent')
	<!--Kontent/Koding Disini-->

		<!-- BREADCRUMB -->
		<div id="breadcrumb">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Category</a></li>
					<li class="active">Lihat Nama Barang </li>
				</ul>
			</div>
		</div>
		<!-- /BREADCRUMB -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!--  Product Details -->
					<div class="product product-details clearfix">
						<div class="col-md-6">
							<div id="product-main-view">
								@foreach($gambar_barang as $g)
									<div class="product-view">
										<img src="{!!asset('/gambar/'.$g->nama_gambar)!!}" alt="">
									</div>
								@endforeach
							</div>
							<div id="product-view">
								@foreach($gambar_barang as $g)
									<div class="product-view">
										<img src="{!!asset('/gambar/'.$g->nama_gambar)!!}" alt="">
									</div>
								@endforeach
							</div>
						</div>
						<div class="col-md-6">
							<div class="product-body">
								<div class="product-label">
									<span>BARU</span>
									<span class="sale">-20%</span>
								</div>
								<h2 class="product-name">{{$data_barang->nama_barang}} </h2>
								<h3 class="product-price">Rp.{{$data_barang->harga}} </h3>
								<div>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<a href="#">3 Review(s) / Add Review</a>
								</div>
								<p><strong>Tersedianya:</strong> Tersedia</p>
								<p>	{{$data_barang->deskripsi}}</p>
								<br>

								<div class="product-btns">
									<form class="" action="/tambahcheckout" method="post">
									<input type="hidden" name="id_produk" value="{{$data_barang->id}}">
									{{csrf_field()}}
									<div class="qty-input">
										<span class="text-uppercase">QTY: </span>
										<input class="input" type="number" name="qty" value="1" readonly>
									</div>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</button>
									<div class="pull-right">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="product-tab">
								<ul class="tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Deskripsi</a></li>
									<li><a data-toggle="tab" href="#tab2">Ulasan (3)</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab1" class="tab-pane fade in active">
										{{$data_barang->deskripsi}}
									</div>
									<div id="tab2" class="tab-pane fade in">

										<div class="row">
											<div class="col-md-6">
												<div class="product-Ulasan">
													<div class="single-review">
														<div class="review-heading">
															<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
															<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
															<div class="review-rating pull-right">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
																irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
														</div>
													</div>

													<div class="single-review">
														<div class="review-heading">
															<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
															<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
															<div class="review-rating pull-right">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
																irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
														</div>
													</div>

													<div class="single-review">
														<div class="review-heading">
															<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
															<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
															<div class="review-rating pull-right">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
																irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
														</div>
													</div>

													<ul class="reviews-pages">
														<li class="active">1</li>
														<li><a href="#">2</a></li>
														<li><a href="#">3</a></li>
														<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="col-md-6">
												<h4 class="text-uppercase">Write Your Review</h4>
												<p>Your email address will not be published.</p>
												<form class="review-form">
													<div class="form-group">
														<input class="input" type="text" placeholder="Your Name" />
													</div>
													<div class="form-group">
														<input class="input" type="email" placeholder="Email Address" />
													</div>
													<div class="form-group">
														<textarea class="input" placeholder="Your review"></textarea>
													</div>
													<div class="form-group">
														<div class="input-rating">
															<strong class="text-uppercase">Your Rating: </strong>
															<div class="stars">
																<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
																<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
																<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
																<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
																<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
															</div>
														</div>
													</div>
													<button class="primary-btn">Submit</button>
												</form>
											</div>
										</div>



									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- /Product Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Di Pilih untuk anda</h2>
						</div>
					</div>
					<!-- section title -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="{!!asset('img/product04.jpg')!!}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">Rp.150.000,00</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Lihat Nama Barang </a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>BARU</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="{!!asset('/img/product03.jpg')!!}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">Rp.150.000,00</h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Lihat Nama Barang </a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="{!!asset('./img/product02.jpg')!!}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">Rp.150.000,00 <del class="product-old-price">Rp.45.000,00</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Lihat Nama Barang </a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->

					<!-- Product Single -->
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<div class="product-label">
									<span>BARU</span>
									<span class="sale">-20%</span>
								</div>
								<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="{!!asset('./img/product01.jpg')!!}" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price">Rp.150.000,00 <del class="product-old-price">Rp.45.000,00</del></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#">Lihat Nama Barang </a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> BELI SEKARANG</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /Product Single -->
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
