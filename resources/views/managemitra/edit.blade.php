@extends('layouts.global')

@section('title')Edit Mitra
@endsection

@section('content')

<div class="row">
	<div class="container col-sm-12">
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
		<h2>Edit mitra</h2>
		<div class="box">
			<div class="box-body">
		<form
		action="{{route('manage-mitra.update', ['id' => $mitra->id ])}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
	<input
	type="hidden"
	value="PUT"
	name="_method">
		<label for="title">Nama mitra</label> <br>
		<input type="text" class="form-control" name="nama"
		placeholder="Masukkan nama" value="{{$mitra->nama}}" required>
		<br>
<!-- {{old('jkel') == "L" ? 'selected' : '' }} -->
		
		<label for="description">Alamat</label><br>
		<textarea name="alamat" id="description" class="form-control" required>{{$mitra->alamat}}</textarea>
		<br>
		<label for="stock">email</label><br>
	<input type="email" class="form-control" id="stock" name="email"
	 value="{{$mitra->email}}" required><br>
	<label for="stock">Jumlah anggota</label><br>
	<input type="text" class="form-control" id="stock" name="jumlah"
	 value="{{$mitra->jumlah}}" required>
	<br>
	<input type="submit" class="btn btn-primary" value="Publish">
</form>
</div>
</div>
</div>
</div>
</div>


@endsection