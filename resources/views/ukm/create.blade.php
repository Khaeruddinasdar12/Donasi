@extends('layouts.global')

@section('title')Tambah Ukm
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

<h2 align="center">Tambah UKM</h2>
<h4 align="center">Saldo Rp.{{$total}}</h4>
		<form
		action="{{route('ukm.store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<label for="title">Nama penerima ukm</label> <br>
		<input type="text" class="form-control" name="nama_penerima"
		placeholder="Masukkan nama penerima" value="{{ old('nama_penerima') }}" required>
		<br>
		<label for="title">Nama usaha</label> <br>
		<input type="text" class="form-control" name="nama_usaha"
		placeholder="Masukkan nama usaha" value="{{ old('nama_usaha') }}" required>
		<br>
		<label for="cover">Dokumentasi</label>
		<input type="file" class="form-control" name="dokumentasi" value="{{ old('dokumentasi') }}" accept="image/*" required>
		<br>
		<label for="description">Deskripsi</label><br>
		 <div class="box">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('deskripsi') }}
                    </textarea>
            </div>
		<label for="title">Lama donasi (tahun)</label> <br>
		<input type="text" class="form-control" name="lama" onkeypress="return isNumberKey(event)" placeholder="Lama donasi (bilangan tahun)" value="{{ old('lama') }}" required>
		<br>
	<label for="stock">Jumlah  </label><br>
	<input type="number" class="form-control" id="stock" name="jumlah_awal"
	min=0 value="{{ old('jumlah') }}" placeholder="Banyak dana " required>
	<br>
	<input type="submit" name=""
	class="btn btn-primary btn-flat"
	name="save_action"
	value="PUBLISH" >
</form>
</div>
</div>
</div>
</div>
</div>


@endsection