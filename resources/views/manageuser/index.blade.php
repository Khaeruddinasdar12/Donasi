@extends('layouts.global')
@section('title') List donatur @endsection
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
		</div>

			<h2>List Donatur</h2>
		@php
		$no = 1;
		@endphp
		<div class="col-md-6">
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="btn-primary {{Request::get('status') == NULL &&
			Request::path() == 'admin/manageuser' ? 'active' : ''}}" href="
			{{route('manageuser.index')}}">Donatur aktif</a>
		</li>
		<li class="nav-item">
			<a class="btn-primary {{Request::get('status') == 'donatur-tidak-aktif' ?
			'active' : '' }}" href="{{route('manageuser.index', ['status' =>
			'donatur-tidak-aktif'])}}">Donatur tidak aktif</a>
		</li>
	</ul>
</div>
<br>
<br>
@if(Request::get('status') == NULL && Request::path() == 'admin/manageuser')
<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-stripped table-bordered" id="example1" style="width: 100%">
					<thead>
						<tr>
							<th><b>No.</b></th>
							<th><b>Nama</b></th>
							<th><b>Status</b></th>
							<th><b>Email</b></th>
							<th><b>Donasi wajib</b></th>
							<th><b>Total donasi</b></th>
							<th><b>Action</b></th>

						</tr>
					</thead>
					<tbody>
						@foreach($user as $users)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$users->name}}</td>
							<td>@if($users->status == 'active')
								<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Donatur aktif </i></span>
							@else
							<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Tidak aktif </i></span>
						@endif</td>
						<td><a href="mailto:{{$users->email}}">{{$users->email}}</a></td>
							
							<td>Rp. {{format_uang($users->donasi_awal)}}</td>
							<td>Rp. {{format_uang($users->totaldonasi)}}</td>
							<td>
							<a href="{{route('manageuser.show',['id'=>$users->id])}}" class="fa fa-eye" >view </a>
							@if($users->status == 'active')
							<form action="{{route('manageuser.update',['id' => $users->id])}}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="PUT">
								<input type="submit" class="btn btn-danger" name="" onclick="return confirm('Hentikan donatur ?');" value="Hentikan Donatur">
							</form>
							@else
							<form action="" method="">
								<input type="submit" class="btn btn-danger" name="" value="Hentikan Donatur" disabled="">
							</form>
							@endif
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr></tr>
			</tfoot>
		</table>
	</div>
</div>
@elseif(Request::get('status') == 'donatur-tidak-aktif')
<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-stripped table-bordered" id="example1" style="width: 100%">
					<thead>
						<tr>
							<th><b>No.</b></th>
							<th><b>Nama</b></th>
							<th><b>Status</b></th>
							<th><b>Email</b></th>
							<td><b>Deleted by</b></td>
							<th><b>Action</b></th>

						</tr>
					</thead>
					<tbody>
						@foreach($user as $users)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$users->name}}</td>
							<td>@if($users->status == 'active')
								<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Donatur aktif </i></span>
							@else
							<span class="label label-warning" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Tidak aktif </i></span>
						@endif</td>
						<td><a href="mailto:{{$users->email}}">{{$users->email}}</a></td>
						<td>@if($users->namaadmin)admin <strong>{{$users->namaadmin}}</strong>
						@else <strong> undur diri </strong> @endif</td>
							<td>
							<a href="{{route('manageuser.show',['id'=>$users->id])}}" class="fa fa-eye" >view </a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr></tr>
			</tfoot>
		</table>
	</div>
</div>
@endif
</div>
</div>
</div>
@endsection