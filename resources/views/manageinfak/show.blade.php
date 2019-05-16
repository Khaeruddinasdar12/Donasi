@extends('layouts.global')
@section('title') Detail kegiatan @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Nama Kegiatan</b></label><br>
			{{$show->namaproker}}
			<br><br>
			<label><b>Dana yang terpakai</b></label><br>
			Rp. {{format_uang($show->jumlah)}}
			<br><br>
			<label><b>Deskripsi </b></label><br>
			{{$show->deskripsi}}
			<br><br>
			<label><b>Dokumentasi </b></label><br>
			@if($show->dokumentasi)
			<img src="{{asset('storage/' . $show->dokumentasi)}}"
			width="185px">
			@endif
			<br><br>
			<label><b>Penulis </b></label><br>
			admin <strong>{{$show->namaadmin}}</strong>
			<br><br>
			<label><b>Ditulis Pada : </b></label><br>
			{{$show->created_at}}
			<br><br>

		</div>
	</div>
</div>
</div>
@endsection