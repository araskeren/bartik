@extends('template.master')

@section('judulhalaman','Tambah Barang')

@section('csstambahan')
<!-- ini adalah tempatnya CSS Tambahan -->
<style media="screen">
#formdiv {
text-align: center;
}
#file {
color: green;
padding: 5px;
border: 1px dashed #123456;
background-color: #f9ffe5;
}
#img {
width: 17px;
border: none;
height: 17px;
margin-left: -20px;
margin-bottom: 191px;
}
.upload {
width: 100%;
height: 30px;
}
.previewBox {
text-align: center;
position: relative;
width: 150px;
height: 150px;
margin-right: 10px;
margin-bottom: 20px;
float: left;
}
.previewBox img {
height: 150px;
width: 150px;
padding: 5px;
border: 1px solid rgb(232, 222, 189);
}
.delete {
color: red;
font-weight: bold;
position: absolute;
top: 0;
cursor: pointer;
width: 20px;
height:  20px;
border-radius: 50%;
background: #ccc;
}
</style>
@endsection

@section('kontent')
	<!--Kontent/Koding Disini-->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<h3>Tambah Antik</h3>
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					{{csrf_field()}}
					<!--falidasi input -->
					<div class="col-xs-12 col-md-6 col-lg-6">

						<div class="form-group">
					    <label for="nama_barang" class="col-sm-3 control-label">Nama Barang</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama_barang">
					    </div>
					  </div>
					  <div class="form-group">
							<label for="kategori_barang" class="col-sm-3 control-label">Kategori</label>
						 <div class="col-sm-9">
							 <select class="form-control" name="kategori_barang">
								 <option value="" readonly>Pilih Kategori</option>
								 @foreach($kategori as $a)
								 <option value="{{$a->id}}">{{$a->nama}}</option>
								 @endforeach
							 </select>
						 </div>
					  </div>
						<div class="form-group">
						 <label for="jenis_barang" class="col-sm-3 control-label" >Jenis</label>
							<div class="col-sm-9">
								<select class="form-control" name="jenis_barang">
									<option value="pilih">Pilih Jenis</option>
									@foreach($jenis as $jns)
									<option value="{{$jns->id}}">{{$jns->nama}}</option>
									@endforeach

								</select>
							</div>
					 	</div>
					 <div class="form-group">
						<label for="harga" class="col-sm-3 control-label">Harga</label>
						 <div class="col-sm-9">
							 <input type="text" class="form-control" id="harga" placeholder="Rp." name="harga">
						 </div>
					</div>
					<div class="form-group">
					 <label for="stok" class="col-sm-3 control-label">Stok</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="stok" placeholder="stok barang" name="stok">
						</div>
				 </div>
				 <div class="form-group">
					 <label for="deskripsi" class="col-sm-3 control-label">Deskripsi :</label>
					 <div class="col-sm-9">
						 <textarea name="deskripsi" rows="8" cols="55"></textarea>
				 		</div>
				 </div>
				 <div class="form-group">
						<script>
						function preview_images(){
						 var total_file=document.getElementById("images").files.length;
						 for(var i=0;i<total_file;i++)
						 {
						  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
						 }
						}
						</script>
						<label for="gambar" class="col-sm-3 control-label">Gambar</label>
						<div class="col-md-6">
				      <input type="file" class="form-control" id="images" name="images" onchange="preview_images();" multiple="multiple"/>
						</div>

					</div>
					<div class="row" id="image_preview"></div>
				 <div class="form-group">
					    <div class="col-sm-offset-10 col-sm-2">
					      <button type="submit" class="btn btn-primary">Simpan</button>
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
<script type="text/javascript">
$('#add_more').click(function() {
				 "use strict";
				 $(this).before($("<div/>", {
					 id: 'filediv'
				 }).fadeIn('slow').append(
					 $("<input/>", {
						 name: 'file[]',
						 type: 'file',
						 id: 'file',
						 multiple: 'multiple',
						 accept: 'image/*'
					 })
				 ));
			 });

			 $('#upload').click(function(e) {
				 "use strict";
				 e.preventDefault();

				 if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
					 alert("No files are selected.");
					 return false;
				 }

				 // Now, upload the files below...
				 // https://developer.mozilla.org/en-US/docs/Using_files_from_web_applications#Handling_the_upload_process_for_a_file.2C_asynchronously
			 });

			 deletePreview = function (ele, i) {
				 "use strict";
				 try {
					 $(ele).parent().remove();
					 window.filesToUpload.splice(i, 1);
				 } catch (e) {
					 console.log(e.message);
				 }
			 }

			 $("#file").on('change', function() {
				 "use strict";

				 // create an empty array for the files to reside.
				 window.filesToUpload = [];

				 if (this.files.length >= 1) {
					 $("[id^=previewImg]").remove();
					 $.each(this.files, function(i, img) {
						 var reader = new FileReader(),
							 newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
							 deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
							 preview = newElement.find("img");

						 reader.onloadend = function() {
							 preview.attr("src", reader.result);
							 preview.attr("alt", img.name);
						 };

						 try {
							 window.filesToUpload.push(document.getElementById("file").files[i]);
						 } catch (e) {
							 console.log(e.message);
						 }

						 if (img) {
							 reader.readAsDataURL(img);
						 } else {
							 preview.src = "";
						 }

						 newElement.appendTo("#filediv");
					 });
				 }
			 });
</script>
@endsection
