@extends('layouts.global')
@section('title') Detail Program Kerja @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">

			<label><b>Nama Program Kerja</b></label><br>
			{{$proker->nama_kegiatan}}
			<br><br>

			<label><b>Deskripsi</b></label><br>
			@php echo $proker->deskripsi; @endphp
			<br><br>
			
			<br><br>
			<label><b>Dokumentasi </b></label><br>
			@if($proker->dokumentasi)
			<img src="{{asset('storage/' . $proker->dokumentasi)}}"
			width="185px">
			@endif
			<br><br>

			<label><b>Penulis </b></label><br>
			admin <strong>{{$proker->namaadmin}}</strong>
			<br><br>

			<label><b>Ditulis Pada : </b></label><br>
			{{$proker->created_at}}
			<br><br>

		</div>
	</div>
</div>
</div>
@endsection