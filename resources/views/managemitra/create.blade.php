@extends('layouts.global')

@section('title')Tambah Mitra
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
		<div class="box">
			<div class="box-body">

<h2 align="center">Tambahkan mitra</h2>
		<form
		action="{{route('manage-mitra.store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<label for="title">Nama mitra</label> <br>
		<input type="text" class="form-control" name="nama"
		placeholder="Masukkan nama mitra" value="{{ old('nama') }}" required>
		<label for="description">Alamat</label><br>
		<textarea name="alamat" id="description" class="form-control"
		placeholder="Masukkan alamat mitra" rows="3" required>{{ old('alamat') }}</textarea>
		<br>
		<label for="title">Email</label> <br>
		<input type="email" class="form-control" name="email"
		placeholder="Masukkan email" value="{{ old('email') }}"required>
		<br>
		<label for="title">Jumlah angggota</label> <br>
		<input type="text" class="form-control" name="jumlah"
		placeholder="Masukkan jumlah anggota" required>
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