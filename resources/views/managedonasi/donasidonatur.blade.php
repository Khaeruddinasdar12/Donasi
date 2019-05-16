@extends('layouts.global')
@section('title') Donasi donatur @endsection
@section('content')


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

		@php
		$no = 1;
		@endphp
		<h2>Donasi donatur</h2>
		<div class="col-md-6">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="btn-success {{Request::get('status') == NULL &&
					Request::path() == 'admin/manage-donasi-donatur' ? 'active' : ''}}" href="
					{{route('manage-donasi-donatur.index')}}">All Post</a>
				</li>
				<li class="nav-item">
					<a class="btn-success {{Request::get('status') == 'sampai' ?
					'active' : '' }}" href="{{route('manage-donasi-donatur.index', ['status' =>
					'sampai'])}}">Terkirim</a>
				</li>
				<li class="nav-item">
					<a class="btn-success {{Request::get('status') == 'belum' ?
					'active' : '' }}" href="{{route('manage-donasi-donatur.index', ['status' =>
					'belum'])}}">Belum Sampai</a>
				</li>
			</ul>
		</div>

		
		@if(Request::get('status') == NULL && Request::path() == 'admin/manage-donasi-donatur')
		<div class="box" style="margin-top: 60px;">
			<div class="box-body">	
				<table id="example1" class="table table-bordered table-striped" style="width: 100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Pengirim</th>
							<th>Jkel</th>
							<th>Email</th>
							<th>Jumlah Donasi</th>
							<th>Bukti Pembayaran</th>
							<th>Status</th>
							<th>Created at</th>
						</tr>
					</thead>
					<tbody>
						@foreach($donasi as $donasis)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$donasis->name}}</td>
							<td>{{$donasis->jkel}}</td>
							<td>{{$donasis->email}}</td>
							<td>Rp. {{format_uang($donasis->jumlah)}}</td>
							<td><img src="{{asset('storage/' . $donasis->foto)}}"
								width="120px">
								<td>@if($donasis->status == 'sampai')
									<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Terkirim</i></span>
									@else
									<span class="label label-warning" style="font-size: 13px;"><i class="fa fa-spinner"> Process</i>   </span>
								@endif</td>
								<td>{{$donasis->created_at}}</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			@elseif(Request::get('status') == 'sampai')

			<div class="box" style="margin-top: 60px;">
				<div class="box-body">	
					<table id="example1" class="table table-bordered table-striped" style="width: 100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Pengirim</th>
								<th>Jkel</th>
								<th>Email</th>
								<th>Jumlah Donasi</th>
								<th>Bukti Pembayaran</th>
								<th>Konfirmasi oleh</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>

							@foreach($donasi as $donasis)
							<tr>
								<td>{{$no++}}</td>
								<td>{{$donasis->name}}</td>
								<td>{{$donasis->jkel}}</td>
								<td>{{$donasis->email}}</td>
								<td>Rp. {{format_uang($donasis->jumlah)}}</td>
								<td><img src="{{asset('storage/' . $donasis->foto)}}"
									width="120px"></td>
									<td>admin <strong>{{$donasis->namaadmin}}</strong></td>
									<td><span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Diterima</i></span></td>
								</tr>
								@endforeach

							</tbody>
							<tfoot>
								<tr>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				@elseif(Request::get('status') == 'belum')
				<div class="box" style="margin-top: 60px;">
					<div class="box-body">	
						<table id="example1" class="table table-bordered table-striped" style="width: 100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Pengirim</th>
									<th>Jkel</th>
									<th>Email</th>
									<th>Jumlah Donasi</th>
									<th>Bukti Pembayaran</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>

								@foreach($donasi as $donasis)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$donasis->name}}</td>
									<td>{{$donasis->jkel}}</td>
									<td>{{$donasis->email}}</td>
									<td>Rp. {{format_uang($donasis->jumlah)}}</td>
									<td>@if($donasis->foto)<img src="{{asset('storage/' . $donasis->foto)}}"
										width="120px">
										@else <span class="label label-warning" style="font-size: 13px;"><i class="fa fa-spinner"> Process</i> 
										@endif</td>

										<td>@if($donasis->foto)<form 
											action="{{route('manage-donasi-donatur.update', ['id' => $donasis->id])}}"
											method="POST">
											@csrf
											<input
											type="hidden"
											value="PUT"
											name="_method">

											<input onclick="return confirm('Donasi {{$donasis->name}} Telah Diterima ?')" 
											type="submit"
											value="Konfirmasi Bukti"
											class="btn btn-success btn-flat">

										</form>
										@else
										<form 
										action="{{route('manage-donasi-donatur.update', ['id' => $donasis->id])}}"
										method="POST">
										@csrf
										<input
										type="hidden"
										value="PUT"
										name="_method">
										
										<input onclick="return confirm('Donasi {{$donasis->name}} Telah Diterima ?')" 
										type="submit"
										value="Konfirmasi Bukti"
										class="btn btn-success btn-flat" disabled="">
										
									</form>
								@endif</td>

							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
							</tr>
						</tfoot>
					</table>
				
			@endif
		</div>
			</div>
	</div>
</div>
</div>



@endsection