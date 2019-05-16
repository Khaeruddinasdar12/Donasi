@extends('layouts.global')
@section('title') List anak yatim @endsection
@section('content')
<div class="container col-sm-12">
	<div class="row">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List anak yatim</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('manage-yatim.create')}}"
						class="btn btn-primary fa fa-plus btn-flat"
						> Add anak yatim</a>
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
									<th>Nama</th>
									<th>Jenis kelamin</th>
									<th>Ditambahkan oleh</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($yatim as $yatims)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$yatims->name}}</td>
									<td>{{$yatims->jkel}}</td>
									<td>{{$yatims->namaadmin}}</td>
									<td>
										<div class="row1">
											<a href="{{route('manage-yatim.edit', ['id' => $yatims->id])}}" class="fa fa-edit"> Edit </a>
											<a href="{{route('manage-yatim.show', ['id' => $yatims->id])}}" class="fa fa-eye"> View </a>

											<form
											method="POST"
											action=""
											class="d-inline"
											onsubmit="return confirm('Hapus yatim ?')"
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