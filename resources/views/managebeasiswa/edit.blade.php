@extends('layouts.global')

@section('title')Edit Beasiswa
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
			
			<div class="box-body"><h2>Edit Beasiswa</h2>
		<form
		action="{{route('manage-beasiswa.update', ['id' => $beasiswa->id])}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<input
	type="hidden"
	value="PUT"
	name="_method">
		<label for="title">Nama penerima</label> <br>
		<input type="text" class="form-control" name="nama_penerima"
		value="{{$beasiswa->nama_penerima}}" required>
		<br>

		<div class="form-group">
			<label>Jenis Kelamin</label><br>
				@if($beasiswa->jkel =='L')
                <label>    	
                  <input type="radio" name="jkel" value="L" class="minimal" required checked>Laki-laki
                </label>
                <label>
                  <input type="radio" name="jkel" value="P" class="minimal" required>Perempuan
                </label>
                @else
                <label>    	
                  <input type="radio" name="jkel" value="L" class="minimal" required >Laki-laki
                </label>
                <label>
                  <input type="radio" name="jkel" value="P" class="minimal" required checked>Perempuan
                </label>
                @endif
        </div>

		<label for="title">Nama penerima</label> <br>
		<input type="text" class="form-control" name="kampus"
		value="{{$beasiswa->kampus}}" required>
		<br>

		<label for="cover">Dokumentasi</label><br>
		<small class="text-muted">Current photo</small><br>
		@if($beasiswa->dokumentasi)
		<img src="{{asset('storage/' . $beasiswa->dokumentasi)}}" width="120px"/>
		@endif
		<br><br>
		<input
		type="file" class="form-control"
		name="dokumentasi"
		>
		<small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small>
		<br><br>
		<label for="description">Deskripsi</label><br>
		 <div class="box">
                    <textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{$beasiswa->deskripsi }}
                    </textarea>
            </div>
		
		<label for="title">Asal Mitra</label> <br>
		<select class="form-control" name="mitra">
			@foreach($mitra as $mitras)
			<option value="{{$mitras->id}}" {{$beasiswa['id_mitra'] == $mitras['id'] ? 'selected' : '' }}>{{$mitras->nama}}</option>
			@endforeach
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