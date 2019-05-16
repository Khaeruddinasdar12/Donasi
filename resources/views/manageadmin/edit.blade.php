@extends('layouts.global')

@section('title')Edit Pemberdayaan
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
		<form
		action="{{route('manageadmin.update', ['id' => $admin->id])}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
	<input
	type="hidden"
	value="PUT"
	name="_method">
		<label for="title">Nama</label> <br>
		<input type="text" class="form-control" name="name"
		 value="{{$admin->name}}" required>
		<br>

		<div class="form-group">
			<label>Jenis Kelamin</label><br>
				@if($admin->jkel =='L')
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
        
		<label for="title">Email</label> <br>
		<input type="text" class="form-control" name="email"
		  value="{{$admin->email}}" required>
		<br>

		<label for="cover">Foto Profile</label><br>
		<small class="text-muted">Current cover</small><br>
		@if($admin->foto)
		<img src="{{asset('storage/' . $admin->foto)}}" width="120px"/>
		@endif
		<br><br>
		<input
		type="file"class="form-control"
		name="foto" accept="image/*"
		>
		<small class="text-muted">Kosongkan jika tidak ingin mengubah
		cover</small>
		<br>
		<br>
		
	<label for="stock">Kontak</label><br>
	<input type="number" class="form-control" id="stock" name="nohp"
	min=0 value="{{$admin->phone}}" required>
	<br>
	<label for="stock">Ubah Password</label><br>
	<input type="password" placeholder="minimal 6 karakter" class="form-control" id="stock" name="password" pattern="^\S{6,}$" 
		onchange="this.setCustomValidity(this.validity.patternMismatch ? 'minimal 6 karakter' : '');">
	<br>
	<input type="submit" class="btn btn-primary" value="PUBLISH">
</form>
</div>
</div>
</div>
</div>
</div>


@endsection