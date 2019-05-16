@extends('layouts.global')

@section('title')Edit Pemberdayaan
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
		<form
		action="{{route('manage-yatim.update', ['id' => $pemberdayaanadmin->id])}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
	<input
	type="hidden"
	value="PUT"
	name="_method">
		<label for="title">Nama Penerima</label> <br>
		<input type="text" class="form-control" name="nama"
		placeholder="Masukkan nama" value="{{$pemberdayaanadmin->name}}" required>
		<br>
<!-- {{old('jkel') == "L" ? 'selected' : '' }} -->
		<br>
		<label for="description">Deskripsi</label><br>
		<textarea name="deskripsi" id="description" class="form-control"
		placeholder="Masukkan deskripsi untuk anak yatim ini"  required>{{$pemberdayaanadmin->deskripsi}}</textarea>
		<br>
	<label for="stock">Jumlah</label><br>
	<input type="text" class="form-control" id="stock" name="jumlah"
	 value="{{$pemberdayaanadmin->jumlah}}" required>
	<br>
	<input type="submit" class="btn btn-primary" value="Add yatim">
</form>
</div>
</div>
</div>
</div>
</div>


@endsection