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
				<h3>Buka Toko</h3>
				<form class="form-horizontal">
					<div class="col-xs-12 col-md-6 col-lg-6">
						<div class="form-group">
					    <label for="nama_toko" class="col-sm-3 control-label">Nama Toko</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="nama_toko" placeholder="Nama Toko">
					    </div>
					  </div>
					  <div class="form-group">
							<label for="domain" class="col-sm-3 control-label">Domain</label>
						 <div class="col-sm-9">
							 <input type="text" class="form-control" id="domain" placeholder="Domain">
						 </div>
					  </div>
						<div class="form-group">
						 <label for="asal_pengiriman" class="col-sm-3 control-label">Asal Pengiriman</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="asal_pengiriman" placeholder="Alamat asal">
							</div>
					 </div>
					 <div class="form-group">
						<label for="kode_pos" class="col-sm-3 control-label">Kode Pos</label>
						 <div class="col-sm-9">
							 <input type="text" class="form-control" id="kode_pos" placeholder="kode pos">
						 </div>
					</div>
					<div class="form-group">
					 <label for="alamat_toko" class="col-sm-3 control-label">Alamat Toko</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="alamat_toko" placeholder="Alamat toko">
						</div>
				 </div>
				 <div class="form-group">
					 <label for="alamat_toko" class="col-sm-3 control-label">Pengiriman :</label>
					 <div class="col-sm-9">
					 <div class="col-sm-offset-0 col-sm-12">
						 <div class="checkbox">
							 <label>
								 <input type="checkbox"> JNE
							 </label>
						 </div>
						 <div class="checkbox">
							<label>
								<input type="checkbox"> JNT
							</label>
						</div>
					 </div>
				 </div>
					  <div class="form-group">
					    <div class="col-sm-offset-10 col-sm-2">
					      <button type="submit" class="btn btn-primary">Simpan</button>
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
