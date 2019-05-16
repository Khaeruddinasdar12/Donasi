@extends('layouts.global')
@section('title')Detail yatim @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Nama </b></label><br>
			{{$yatim->name}}
			<br><br>
			<label><b>Cita-cita</b></label><br>
			{{$yatim->cita}}
			<br><br>
			<label><b>Jenis Kelamin </b></label><br>
			@if($yatim->jkel == 'L') Laki-laki
			@else Perempuan
			@endif
			<br><br>
			<label><b>Tempat, Tanggal lahir </b></label><br>
			{{$yatim->tgl_lahir}}
			<br><br>
			<label><b>Deskripsi </b></label><br>
			{{$yatim->deskripsi}}
			<br><br>
			<label><b>ditambahkan oleh</b></label><br>
			admin <strong>{{$yatim->namaadmin}}</strong>


		</div>
	</div>
</div>
</div>
@endsection