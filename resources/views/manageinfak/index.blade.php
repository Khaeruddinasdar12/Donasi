@extends('layouts.global')
@section('title') List kegiatan infak @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List kegiatan infak</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('manage-infak.create')}}"
						class="btn btn-primary fa fa-plus btn-flat"
						> Tambah kegiatan</a>
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
									<th>Nama kegiatan</th>
									<th>jumlah dana</th>
									<th>Created by</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($infak as $infaks)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$infaks->namaproker}}</td>
									<td>Rp. {{format_uang($infaks->jumlah)}}</td>
									<td>admin <strong>{{$infaks->namaadmin}}</strong></td>
									<td>
										<div class="row1">
											<a href="{{route('manage-infak.edit', ['id' => $infaks->id])}}" class="fa fa-edit"> Edit </a>
											<a href="{{route('manage-infak.show', ['id' => $infaks->id])}}" class="fa fa-eye"> View </a>
											<form
											method="POST"
											action="{{route('manage-infak.destroy', ['id' => $infaks->id])}}"
											class="d-inline"
											onsubmit="return confirm('Hapus Kegiatan Infak ?');"
											>
											@csrf
											<input type="hidden" name="_method" value="DELETE">
											<input type="submit" value="Delete" class="btn btn-danger">
										</form>
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