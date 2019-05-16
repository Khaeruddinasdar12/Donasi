@extends('layouts.global')
@section('title') Detail donatur @endsection
@section('content')

<div class="box">
	<h2 align="center">Detail donatur</h2>
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Photo </b></label><br>
			<img src="{{asset('storage/' . $user->foto)}}"
			width="160px"><br>
			<label><b>Name </b></label><br>
			{{$user->name}}
			<br><br>
			<label><b>Email</b></label><br>
			{{$user->email}}
			<br><br>
			<label><b>Donasi wajib</b></label><br>
			Rp. {{format_uang($user->donasi_awal)}}
			<br><br>
			<label><b>Phone </b></label><br>
			{{$user->nohp}}
			<br><br>
			<label><b>Job </b></label><br>
			{{$user->pekerjaan}}
			<br><br>
			<label><b>Address </b></label><br>
			{{$user->alamat}}
			<br><br>
			<label><b>Status </b></label><br>
			@if($user->status == 'active')
								<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Donatur aktif </i></span>
							@else
							<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Tidak aktif </i></span>
						@endif
		</div>
	</div>
</div>
</div>
</div>
@endsection