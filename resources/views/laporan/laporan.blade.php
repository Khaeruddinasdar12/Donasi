@extends('layouts.global')
@section('title') Laporan @endsection
@section('content')
<style>
	/*.dropdown-submenu {
		position: relative;
	}

	.dropdown-submenu .dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
		}*/

		.dropdown-submenu {
			position: relative;
		}
		.dropdown-submenu > a.dropdown-item:after {
			font-family: FontAwesome;
			content: "\f054";
			float: right;
		}
		.dropdown-submenu > a.dropdown-item:after {
			content: ">";
			float: right;
		}
		.dropdown-submenu > .dropdown-menu {
			top: 0;
			left: 100%;
			margin-top: 0px;
			margin-left: 0px;
		}
		.dropdown-submenu:hover > .dropdown-menu {
			display: block;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
// $(document).ready(function(){
//   $('.dropdown-submenu a.test').on("click", function(e){
//     $(this).next('ul').toggle();
//     e.stopPropagation();
//     e.preventDefault();
//   });
// });

$(".dropdown-toggle").on("mouseenter", function () {
    // make sure it is not shown:
    if (!$(this).parent().hasClass("show")) {
    	$(this).click();
    }
});

$(".btn-group, .dropdown").on("mouseleave", function () {
    // make sure it is shown:
    if ($(this).hasClass("show")){
    	$(this).children('.dropdown-toggle').first().click();
    }
});


</script>

<nav class="navbar navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			@if($year == null && $month == null)
			<a href="" class="navbar-brand"><b>Laporan</b> keseluruhan</a>
			@else
			<a href="" class="navbar-brand"><b>Laporan</b> tahun {{ $year}} bulan {{$month}}</a>
			@endif
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				<i class="fa fa-bars"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tahun<span class="caret"></span></a>
					<ul class="dropdown-menu">
						@foreach($tahun as $tahuns)
						<li class="dropdown-submenu">
							<a class="test" tabindex="-1" href="#" >{{$tahuns->date}} <span class="caret">
							</span></a>
							<ul class="dropdown-menu">
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>1])}}"> 
								Januari</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>2])}}"> 
								Februari</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>3])}}"> 
								Maret</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>4])}}"> 
								April</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>5])}}"> 
								Mei</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>6])}}"> 
								Juni</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>7])}}"> 
								Juli</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>8])}}"> 
								Agustus</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>9])}}"> 
								September</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>10])}}"> 
								Oktober</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>11])}}"> 
								November</a></li>
								<li><a href="{{route('laporan.index',['year'=>$tahuns->date, 'month'=>12])}}"> 
								Desember</a></li>
							</ul>
						</li>
						@endforeach
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="row">
	<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="alert alert-danger">
				{{session('gagal')}}
			</div>
			@endif
			
		</div>

		@php
		$no = 1;
		$i = 0;
		@endphp

		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-stripped table-bordered" id="example1" style="width: 100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Kegiatan</th>
							<th>Dana</th>
							<th>Waktu</th>
						</tr>
					</thead>
					<tbody>
						@foreach($laporan as $laporans)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$laporans->nama_penerima}}</td>
							<td>{{$laporans->roles}}</td>
							<td>Rp. {{format_uang($laporans->jumlah_total)}}</td>
							<td>{{$laporans->created_at}}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3" align="center"><b>Total : </b></td>
							<td colspan="2"><strong>Rp. {{format_uang($total)}}</strong></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
@endsection