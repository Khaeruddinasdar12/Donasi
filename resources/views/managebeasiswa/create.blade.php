@extends('layouts.global')

@section('title')Tambah beasiswa
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
		<div class="box" style="align-self: center;">
			<div class="box-body" >

<h2 align="center">Tambah Beasiswa</h2>
<h4 align="center">Saldo Rp.{{$total}}</h4>
		<form
		action="{{route('manage-beasiswa.store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<label for="title">Nama penerima</label> <br>
		<input type="text" class="form-control" name="nama_penerima"
		placeholder="Masukkan nama " value="{{old('nama_penerima')}}" required>
		<br>
		<div class="form-group">
			<label>Jenis Kelamin</label><br>
                <label>
                  <input type="radio" name="jkel" value="L" class="minimal" required>Laki-laki
                </label>
                <label>
                  <input type="radio" name="jkel" value="P" class="minimal" required>Perempuan
                </label>
              </div>
		<label for="title">Asal kampus</label> <br>
		<input type="text" class="form-control" name="kampus"
		placeholder="Masukkan nama kampus " value="{{old('kampus')}}" required>
		<br>
		<label for="cover">Dokumentasi</label>
		<input type="file" class="form-control" name="dokumentasi" value="{{old('dokumentasi')}}" accept="image/*" required>
		<br>
		<label for="description">Deskripsi</label><br>
		 <div class="box">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('deskripsi') }}
                    </textarea>
            </div>
		<br>
		<label for="title">Jenjang pendidikan</label> <br>
		<select class="form-control" name="pendidikan" required>
			<option value="S1">S1</option>
			<option value="D3" >D3</option>
		</select>
		<br>
		<label for="title">Asal Mitra</label> <br>
		<select class="form-control" name="mitra" required>
			@foreach($mitra as $mitras)
			<option value="{{$mitras->id}}">{{$mitras->nama}}</option>
			@endforeach
		</select>
		<br>
	<label for="stock">Jumlah beasiswa persemester  </label><br>
	<input type="number" class="form-control" id="stock" name="jumlah_persemester"
	min=0 required>
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