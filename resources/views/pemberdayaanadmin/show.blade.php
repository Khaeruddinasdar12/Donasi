@extends('layouts.global')
@section('title') Detail Penyaluran @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Nama Penerima</b></label><br>
			{{$show->name}}
			<br><br>
			<label><b>Jumlah</b></label><br>
			Rp. {{format_uang($show->jumlah)}}
			<br><br>
			<label><b>Deskripsi </b></label><br>
			{{$show->deskripsi}}
			<br><br>
			<label><b>Penulis </b></label><br>
			{{$show->namaadmin}}
			<br><br>
			<label><b>Dokumentasi </b></label><br>
			@if($show->dokumentasi)
			<img src="{{asset('storage/' . $show->dokumentasi)}}"
			width="120px">
			@endif

		</div>
	</div>
</div>
</div>
@endsection