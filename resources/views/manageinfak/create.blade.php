@extends('layouts.global')

@section('title')Tambah kegiatan infak
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
			<div class="box-body">

<h2 align="center">Tambah Kegiatan Infak</h2>
<h4 align="center">Saldo Rp. {{$total}}</h4>
		<form
		action="{{route('manage-infak.store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<label for="title">Nama kegiatan</label> <br>
		<select name="nama_kegiatan" class="form-control" required>
			<option hidden>--Pilih program kerja--</option>
			@foreach($nama_kegiatan as $nama_kegiatans)
			<option value="{{$nama_kegiatans->id}}">{{$nama_kegiatans->nama_kegiatan}}</option>
			@endforeach
		</select>
		<!-- <input type="text" class="form-control" name="nama_kegiatan"
		placeholder="Masukkan nama kegiatan" value="{{ old('nama_kegiatan') }}" required> -->
		<br>
		<label for="cover">Dokumentasi</label>
		<input type="file" class="form-control" name="dokumentasi" value="{{ old('dokumentasi') }}" accept="image/*" required>
		<br>

		<label for="description">Deskripsi</label><br>
		 <div class="box">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('deskripsi') }}
                    </textarea>
            </div>

	<label for="stock">Dana Kegiatan</label><br>
	<input type="number" class="form-control" id="stock" name="jumlah"
	min=0 value="{{ old('jumlah') }}" accept="image/*" required>
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