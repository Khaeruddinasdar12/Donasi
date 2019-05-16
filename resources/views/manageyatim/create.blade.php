@extends('layouts.global')

@section('title')Add yatim
@endsection

@section('content')
<div class="container col-sm-12">
<div class="row">
	<div class="col-md-8">
		@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
		@elseif(session('gagal'))
		<div class="alert alert-danger">
			{{session('gagal')}}
		</div>
		@endif
		<div class="box">
			<div class="box-body">

<h2 align="center">Tambahkan anak yatim</h2>
		<form
		action="{{route('manage-yatim.store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<label for="title">Nama anak</label> <br>
		<input type="text" class="form-control" name="nama"
		placeholder="Masukkan nama yatim" required>
		<br>
		<label for="title">Cita-cita</label> <br>
		<input type="text" class="form-control" name="cita"
		placeholder="Masukkan cita-cita" required>
		<br>
		<label for="title">Tempat lahir</label> <br>
		<input type="text" class="form-control" name="tempat"
		placeholder="Tempat lahir" required>
		<br>
		<label for="title">Tanggal lahir</label> <br>
		<input type="date" class="form-control" name="ttl"
		placeholder="Tempat lahir" required>	
		<br>
		<label for="description">Deskripsi</label><br>
		<textarea name="deskripsi" id="description" class="form-control"
		placeholder="Give a description about this book" rows="5" required></textarea>
		<br>
		<label for="title">Jenis Kelamin</label> <br>
		<select class="form-control" name="jkel">
			<option value="L" >Laki-laki</option>
			<option value="P" >Perempuan</option>
		</select>
		<br>
	<button
	class="btn btn-primary btn-flat"
	name="save_action"
	value="PUBLISH" >Publish</button>
</form>
</div>
</div>
</div>
</div>
</div>


@endsection