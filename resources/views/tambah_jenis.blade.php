@extends('template.master')

@section('judulhalaman','Tambah Jenis')

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
				<h3>Tambah Kategori</h3>
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					{{csrf_field()}}
					<!--falidasi input -->
					<div class="col-lg-6">
						<div class="form-group">
							<label for="kategori" class="col-sm-3 control-label">Kategori</label>
							<div class="col-sm-9">
								<select class="form-control" name="kategori" required>
									<option value="" disabled selected>Pilih Kategori</option>
									@foreach($kategori as $i)
										<option value="{{$i->id}}">{{$i->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="nama" class="col-sm-3 control-label">Jenis</label>
							 <div class="col-sm-9">
								 <input type="text" class="form-control" id="nama" placeholder="Kategori" name="nama" required>
							 </div>
						</div>
						<div class="form-group">
					    <div class="col-sm-offset-10 col-sm-2">
					      <button type="submit" class="btn btn-primary" name="Tambah" value="simpan">Tambah</button>
					    </div>
						</div>
					</div>
						<div class="col-lg-6">
							<table class="table table-striped">
								<tr>
									<th>#</th>
									<th>Kategori</th>
									<th>Jenis</th>
									<th>Aksi</th>
								</tr>
							 @foreach($data as $ktg)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$ktg->kategori->nama}}</td>
									<td>{{$ktg->nama}}</td>
									<td>
										<a href="/jenis/ubah/{{$ktg->id}}" class="btn btn-primary">Ubah</a>
										<a href="/jenis/delete/{{$ktg->id}}" class="btn btn-danger">Ubah</a>
									</td>
								</tr>
								@endforeach

							</table>
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
