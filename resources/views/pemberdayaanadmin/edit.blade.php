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
		action="{{route('penyaluran.update', ['id' => $pemberdayaanadmin->id])}}"
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
		placeholder="Book title" value="{{$pemberdayaanadmin->name}}" required>
		<br>

		<label for="cover">Dokumentasi</label><br>
		<small class="text-muted">Current cover</small><br>
		@if($pemberdayaanadmin->dokumentasi)
		<img src="{{asset('storage/' . $pemberdayaanadmin->dokumentasi)}}" width="96px"/>
		@endif
		<br><br>
		<input
		type="file"class="form-control"
		name="dokumentasi"
		>
		<small class="text-muted">Kosongkan jika tidak ingin mengubah
		cover</small>
		<br>

		<br>
		<label for="description">Deskripsi</label><br>
		<textarea name="deskripsi" id="description" class="form-control"
		placeholder="Give a description about this book"  required>{{$pemberdayaanadmin->deskripsi}}</textarea>
		<br>
	<label for="stock">Jumlah</label><br>
	<input type="text" class="form-control" id="stock" name="jumlah"
	 value="{{$pemberdayaanadmin->jumlah}}" required>
	<br>
	<label for="title">Jenis Penyaluran</label> <br>
		<select class="form-control" name="penyaluran">
			<option value="umum" {{$pemberdayaanadmin == "umum" ? 'selected' : '' }}>Umum</option>
			<option value="beasiswa" {{$pemberdayaanadmin == "beasiswa" ? 'selected' : '' }}>Beasiswa</option>
			<option value="ukm" {{$pemberdayaanadmin == "ukm" ? 'selected' : '' }}>ukm</option>
		</select>
		<br>
	<input type="submit" class="btn btn-primary" value="PUBLISH">
</form>
</div>
</div>
</div>
</div>
</div>


@endsection