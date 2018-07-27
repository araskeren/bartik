<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('judulhalaman')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{!!asset('css/slick.css')!!}" />
	<link type="text/css" rel="stylesheet" href="{!!asset('css/slick-theme.css')!!}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{!!asset('css/nouislider.min.css')!!}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{!!asset('css/font-awesome.min.css')!!}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{!!asset('css/style.css')!!}" />
  @yield('csstambahan')
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Selamat Datang di Bartik !</span>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="/">
							<img src="{!!asset('./img/logo.png')!!}" alt>
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form method="post" action="/caribarang">
							{{csrf_field()}}
							<input class="input search-input" type="text" placeholder="Cari Barang" style="padding-left:10px;" name="nama">
							<!-- <select class="input search-categories">
								<option value="0">Semua Kategori</option>
								<option value="1">Kategori 01</option>
								<option value="1">Kategori 02</option>
							</select> -->
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->

							<!-- Cek login -->
							<li class="header-account dropdown default-dropdown">
							@if (Auth::user())
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
							<strong class="text-uppercase">Akunku<i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="#" class="text-uppercase">{{ Auth::user()->name }}</a>
							<ul class="custom-menu">
								<li><a href="/profile"><i class="fa fa-user-o"></i>Profil</a></li>
								@if(Auth::user()->level==1)
								<li><a href="/tambahproduk"><i class="fa fa-user-o"></i>Tambah Barang</a></li>
								<li><a href="/daftarproduk"><i class="fa fa-user-o"></i>Daftar Barang</a></li>
								<li><a href="/kategori"><i class="fa fa-user-o"></i>Kategori</a></li>
								<li><a href="/jenis"><i class="fa fa-user-o"></i>Jenis Barang</a></li>
								@endif
								<li><a href="/daftarpembelian"><i class="fa fa-user-o"></i>Daftar Pembelian</a></li>
								<li>
										<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
												Logout
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
								</li>
							</ul>
							</li>
							@else
							<div class="dropdown-toggle">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase"><a href="/login" class="text-uppercase">Login</a></i></strong>
								</div>
								<a href="/register" class="text-uppercase">Register</a>
							@endif
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<a href="/checkout">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
								</div>
							<strong class="text-uppercase">Keranjang Belanja:</strong>
								<br>
							</a>
						</a>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Kategori <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Peralatan Rumah tangga<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Furniture</h3></li>
											<li><a href="#">Meja</a></li>
											<li><a href="#">Kursi</a></li>
											<li><a href="#">Lemari</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Dapur</h3></li>
											<li><a href="#">Piring</a></li>
											<li><a href="#">Cangkir</a></li>
											<li><a href="#">Teko</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Dekorasi</h3></li>
											<li><a href="#">JAM</a></li>
											<li><a href="#">Guci</a></li>
											<li><a href="#">Lampu Hias</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="{!!asset('./img/banner05.jpg')!!}" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW KOLEKSI</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Barang Seni<i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Anyaman</h3></li>
											<li><a href="#">Bambu</a></li>
											<li><a href="#">Rotan</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Gerabah</h3></li>
											<li><a href="#">Gentong</a></li>
											<li><a href="#">Keramik</a></li>
										</ul>
										<hr class="hidden-md hidden-lg">
									</div>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Lukisan</h3></li>
											<li><a href="#">Pemandangan</a></li>
											<li><a href="#">Orang</a></li>
										</ul>
									</div>
								</div>
								<div class="row hidden-sm hidden-xs">
									<div class="col-md-12">
										<hr>
										<a class="banner banner-1" href="#">
											<img src="{!!asset('./img/banner05.jpg')!!}" alt="">
											<div class="banner-caption text-center">
												<h2 class="white-color">NEW KOLEKSI</h2>
												<h3 class="white-color font-weak">HOT DEAL</h3>
											</div>
										</a>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Uang</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/">Home</a></li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Peralatan Rumah Tangga<i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{{!!asset('./img/banner06.jpg')!!}}" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Furnitur</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Furnitur</h3></li>
											<li><a href="#">Meja</a></li>
											<li><a href="#">Kursi</a></li>
											<li><a href="#">Lemari</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{!!asset('./img/banner07.jpg')!!}" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Dapur</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Dapur</h3></li>
											<li><a href="#">Piring</a></li>
											<li><a href="#">Cangkir</a></li>
											<li><a href="#">Teko</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{!!asset('./img/banner08.jpg')!!}" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Dekorasi</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Dekorasi</h3></li>
											<li><a href="#">Jam</a></li>
											<li><a href="#">Guci</a></li>
											<li><a href="#">Lampu Hias</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Barang Seni <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{!!asset('./img/banner06.jpg')!!}" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Lukisan</h3>
												</div>
											</a>
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Lukisan</h3></li>
											<li><a href="#">Pemandangan</a></li>
											<li><a href="#">Orang</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{!!asset('./img/banner07.jpg')!!}" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Anyaman</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Anyaman</h3></li>
											<li><a href="#">Bambu</a></li>
											<li><a href="#">Rotan</a></li>
										</ul>
									</div>
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											<a class="banner banner-1" href="#">
												<img src="{!!asset('./img/banner08.jpg')!!}" alt="">
												<div class="banner-caption text-center">
													<h3 class="white-color text-uppercase">Gerabah</h3>
												</div>
											</a>
										</div>
										<hr>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title">Gerabah</h3></li>
											<li><a href="#">Gentong</a></li>
											<li><a href="#">Keramik</a></li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li><a href="#">Uang</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				@yield('breadcrumb')
        <li class="active">Blank</li>
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
				<!-- Koding disini -->
        @yield('kontent')
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="{!!asset('./img/logo.png')!!}" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Akunku</h3>
						<ul class="list-links">
							<li><a href="/propil">Profil</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Axit</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{!!asset('js/jquery.min.js')!!}"></script>
	<script src="{!!asset('js/bootstrap.min.js')!!}"></script>
	<script src="{!!asset('js/slick.min.js')!!}"></script>
	<script src="{!!asset('js/nouislider.min.js')!!}"></script>
	<script src="{!!asset('js/jquery.zoom.min.js')!!}"></script>
	<script src="{!!asset('js/main.js')!!}"></script>
  @yield('jstambahan')
</body>

</html>
