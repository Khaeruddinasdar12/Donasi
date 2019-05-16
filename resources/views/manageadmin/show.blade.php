@extends('layouts.global')
@section('title') Detail Admin @endsection
@section('content')
<div class="col-md-8">

<div class="box">
	<h2 align="center">Detail admin</h2>
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Name </b></label><br>
			{{$admin->name}}
			<br><br>
			<label><b>Jenis Kelamin</b></label><br>
			@if($admin->jkel == 'L') Laki-laki @else Perempuan @endif
			<br><br>
			<label><b>Email</b></label><br>
			{{$admin->email}}
			<br><br>
			<label><b>Phone </b></label><br>
			{{$admin->phone}}
			<br><br>
			<label><b>Photo </b></label><br>
			<img src="{{asset('storage/' . $admin->foto)}}"
			width="160px">
		</div>
	</div>
</div>
</div>
</div>
@endsection