@extends('layouts.global')
@section('title') Detail Beasiswa @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Nama Penerima</b></label><br>
			{{$show->nama_penerima}}
			<br><br>
			<label><b>Jenis Kelamin</b></label><br>
			@if($show->jkel == 'L') Laki-laki @else Perempuan @endif
			<br><br>
			<label><b>Jumlah persemester</b></label><br>
			Rp. {{format_uang($show->jumlah_persemester)}}
			<br><br>
			<label><b>Beasiswa yang telah diterima</b></label><br>
			Rp. {{format_uang($show->jumlah_total)}}
			<br><br>
			<label><b>Deskripsi </b></label><br>
			{{$show->deskripsi}}
			<br><br>
			<label><b>Asal mitra </b></label><br>
			{{$show->namamitra}}
			<br><br>
			<label><b>Status </b></label><br>
			@if($show->status == 'active') <span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Active</i></span>
									 @else<span class="label label-warnign" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Inactive</i></span> 
									  @endif
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
			<label><b>Terakhir dicairkan : </b></label><br>
			{{$show->updated_at}}
			<br><br>
			<label><b>Ditulis Pada : </b></label><br>
			{{$show->created_at}}
			<br><br>

		</div>
	</div>
</div>
</div>
@endsection