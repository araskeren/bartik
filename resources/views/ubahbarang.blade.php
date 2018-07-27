@extends('template.master')

@section('judulhalaman','Ubah Barang')

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
				<h3>Ubah Antik</h3>
				<form class="form-horizontal" method="post" action="{{URL('/editbarang')}}" >
					{{csrf_field()}}
					<input type="hidden" name="id" value="{{$data_barang->id}}">
					<div class="col-xs-12 col-md-6 col-lg-6">
						<div class="form-group">
					    <label for="nama_barang" class="col-sm-3 control-label">Nama Barang</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="{{$data_barang->nama_barang}}">
					    </div>
					  </div>

					  <div class="form-group">
							<label for="" class="col-sm-3 control-label">Kategori</label>
						 <div class="col-sm-9">
							 <select class="form-control" name="kategori">
								 <option value="pilih" readonly>Pilih Kategori</option>
								 @foreach($kategori as $kt)
								 <!-- menampilkan kategori dengan selected -->
								 @if($kt->id==$data_barang->kategori)
								 <option value="{{$kt->id}}" selected>{{$kt->nama}}</option>
								 @else
								 <option value="{{$kt->id}}">{{$kt->nama}}</option>
								 @endif
								 @endforeach

							 </select>
						 </div>
					  </div>
						<div class="form-group">
						 <label for="jenis_barang" class="col-sm-3 control-label">Jenis</label>
							<div class="col-sm-9">
								<select class="form-control" name="jenis">
									<option value="pilih">Pilih Jenis</option>
									@foreach($jenis as $jns)
									@if($jns->id==$data_barang->jenis)
									<option value="{{$jns->id}}" selected>{{$jns->nama}}</option>
									@else
									<option value="{{$jns->id}}">{{$jns->nama}}</option>
									@endif
									@endforeach
								</select>
							</div>
					 	</div>
					 <div class="form-group">
						<label for="harga" class="col-sm-3 control-label">Harga</label>
						 <div class="col-sm-9">
							 <input type="text" class="form-control" id="harga" placeholder="Rp." name="harga" value="{{$data_barang->harga}}">
						 </div>
					</div>
					<div class="form-group">
					 <label for="stok" class="col-sm-3 control-label">Stok</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="stok" placeholder="stok barang" name="stok" value="{{$data_barang->stok}}">
						</div>
				 </div>
				 <div class="form-group">
					 <label for="deskripsi" class="col-sm-3 control-label">Deskripsi :</label>
					 <div class="col-sm-9">
					<textarea name="deskripsi" rows="8" cols="55">{{$data_barang->deskripsi}}</textarea>
				 </div>
					  <div class="form-group">
					    <div class="col-sm-offset-10 col-sm-2">
					      <button type="submit" class="btn btn-primary" >Simpan</button>

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
