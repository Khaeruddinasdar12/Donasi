@extends('layouts.global')

@section('title')Tambah Program Kerja
@endsection

@section('content')

<div class="row">
	<div class="container col-sm-12">
	<div class="col-md-10">
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

<h2 align="center">Tambahkan Program Kerja</h2>
		<form
		action="{{route('manage-program-kerja.store')}}"
		method="POST"
		class="shadow-sm p-3 bg-white"
		enctype="multipart/form-data"
		>
		@csrf
		<label for="title">Nama program kerja</label> <br>
		<input type="text" class="form-control" name="nama_kegiatan"
		placeholder="Masukkan nama mitra" value="{{ old('nama_kegiatan') }}" required>
		<br>

		<label for="cover">Dokumentasi</label>
		<input type="file" class="form-control" name="dokumentasi" value="{{ old('dokumentasi') }}" accept="image/*">
		<br>

		<label for="description">Deskripsi</label><br>
		 <div class="box">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('deskripsi') }}
                    </textarea>
            </div>
		
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