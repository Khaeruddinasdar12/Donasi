@extends('layouts.global')
@section('title') List Pemberdayaan @endsection
@section('content')
<div class="container col-sm-12">
	<div class="row">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif

			@if(Request::get('penyaluran') == NULL)
			<h2>Semua Penyaluran</h2>
			@elseif(Request::get('penyaluran') == 'umum')
			<h2>Penyaluran Umum</h2>
			@elseif(Request::get('penyaluran') == 'beasiswa')
			<h2>Penyaluran Beasiswa</h2>
			@elseif(Request::get('penyaluran') == 'ukm')
			<h2>UKM</h2>
			@endif

			<div class="col-md-6">
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a class="btn-info {{Request::get('penyaluran') == NULL &&
						Request::path() == 'admin/penyaluran' ? 'active' : ''}}" href="
						{{route('penyaluran.index')}}">All Post</a>
					<li class="nav-item">
						<a class="btn-info {{Request::get('penyaluran') == 'umum' ?
						'active' : '' }}" href="{{route('penyaluran.index', ['penyaluran' =>
						'umum'])}}">Umum</a>
					</li>
					<li class="nav-item">
						<a class="btn-info {{Request::get('penyaluran') == 'beasiswa' ?
						'active' : '' }}" href="{{route('penyaluran.index', ['penyaluran' =>
						'beasiswa'])}}">Beasiswa</a>
					</li>
					<li class="nav-item">
						<a class="btn-info {{Request::get('penyaluran') == 'ukm' ?
						'active' : '' }}" href="{{route('penyaluran.index', ['penyaluran' =>
						'ukm'])}}">Ukm</a>
					</li>
					</ul>
				</div>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('penyaluran.create')}}"
						class="btn btn-info fa fa-plus btn-flat"
						> Mulai Donasi</a>
					</div>
				</div>
				@php
				$no = 1;
				@endphp
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered table-stripped" id="example1" style="width: 100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Penerima</th>
									<th>Author</th>
									<th>Diedit oleh</th>
									<th>Jumlah</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($book as $books)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$books->name}}</td>
									<td>{{$books->namaadmin}}</td>
									<td>@if($books->updated_by){{$books->updated_by}}
									@else Belum diupdate @endif</td>
									<td>Rp. {{format_uang($books->jumlah)}}</td>
									<td>
										<div class="row1">
											<a href="{{route('penyaluran.edit', ['id' => $books->id])}}" class="fa fa-edit"> Edit </a>
											<a href="{{route('penyaluran.show', ['id' => $books->id])}}" class="fa fa-eye"> View </a>

											<form
											method="POST"
											action="{{route('penyaluran.deletepermanent', ['id' => $books->id])}}"
											class="d-inline"
											onsubmit="return confirm('Hapus Penyaluran ?')"
											>
											@csrf
											<input type="hidden" name="_method" value="DELETE">
											<input type="submit" value="Delete" class="btn btn-danger">
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
							<tfoot>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection