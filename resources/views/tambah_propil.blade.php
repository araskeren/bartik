@extends('template.master')

@section('judulhalaman','Buka Toko')

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
				<h3>Profile</h3>
				<form class="form-horizontal" method="post" >
					<div class="col-xs-12 col-md-6 col-lg-6">
						<div class="form-group">
					    <label for="nama_profil" class="col-sm-3 control-label">Nama</label>
					    <div class="col-sm-9">

					      <input type="text" class="form-control" id="nama_profil" placeholder="nama" value="{{$user->name}}">
					    </div>
					  </div>
					  <div class="form-group">
							<label for="alamat_profil" class="col-sm-3 control-label">Alamat</label>
						 <div class="col-sm-9">
							 @if($profil!=null)
							 <input type="text" class="form-control" id="alamat_profil" placeholder="alamat" name="alamat_profil" value="{{$profil->alamat}}">
							 @else
							 <input type="text" class="form-control" id="alamat_profil" placeholder="alamat" name="alamat_profil" value="">
							 @endif
						 </div>
					  </div>
						<div class="form-group">
						 <label for="email_profil" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="email_profil" placeholder="email" name="email_profil" value="{{$user->email}}">
							</div>
					 </div>
					 <div class="form-group">
						<label for="no_telp" class="col-sm-3 control-label">No.telp</label>
						 <div class="col-sm-9">
							 @if($profil!=null)
							 <input type="text" class="form-control" id="no_telp" placeholder="Notelp" name="no_telp" value="{{$profil->no_telp}}">
							 @else
							 <input type="text" class="form-control" id="no_telp" placeholder="Notelp" name="no_telp" value="">
							 @endif
						 </div>
					</div>
					{{csrf_field()}}
					  <div class="form-group">
					    <div class="col-sm-offset-10 col-sm-2">
								<form class="" action="" method="post">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</form>
					    </div>
					  </div>
					</div>

				</form>
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
