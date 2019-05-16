@extends('layouts.global')

@section('title')Edit Ukm
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
			@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Foto minimal 2MB<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
		<div class="box">
			
			<div class="box-body"><h2>Edit Ukm</h2>
		<form
		action="{{route('ukm.update', ['id' => $ukm->id])}}"
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
		<input type="text" class="form-control" name="nama_penerima"
		placeholder="Book title" value="{{$ukm->nama_penerima}}" required>
		<br>
		<label for="title">Nama Usaha</label> <br>
		<input type="text" class="form-control" name="nama_usaha" value="{{$ukm->nama_usaha}}" required>
		<br>

		<label for="cover">Dokumentasi</label><br>
		<small class="text-muted">Current photo</small><br>
		@if($ukm->dokumentasi)
		<img src="{{asset('storage/' . $ukm->dokumentasi)}}" width="120px"/>
		@endif
		<br><br>
		<input
		type="file" class="form-control"
		name="dokumentasi" accept="image/*"
		>
		<small class="text-muted">Kosongkan jika tidak ingin mengubah
		cover</small>
		<br>
		<br>
		<label for="description">Deskripsi</label><br>
		 <div class="box">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ $ukm->deskripsi }}
                    </textarea>
            </div>
	<label for="stock">Lama donasi</label><br>
	<input type="number" class="form-control" id="stock" name="lama"
	 value="{{$ukm->lama}}" required>
	<br>
	<input type="submit" class="btn btn-primary" value="PUBLISH">
</form>
</div>
</div>
</div>
</div>
</div>


@endsection