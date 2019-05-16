@extends('layouts.global')
@section('title') List Program kerja @endsection
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
			<h2>List Program Kerja</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('manage-program-kerja.create')}}"
						class="btn btn-primary fa fa-plus btn-flat"
						> Tambah program kerja</a>
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
									<th>Cover</th>
									<th>Created by</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($proker as $prokers)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$prokers->nama_kegiatan}}</td>
									<td><img src="{{asset('storage/' . $prokers->dokumentasi)}}"
								width="120px"></td>
									<td>admin <strong>{{$prokers->namaadmin}}</strong></td>
									<td><a href="{{route('manage-program-kerja.edit', ['id' => $prokers->id])}}" class="fa fa-edit"> Edit </a>
										<a href="{{route('manage-program-kerja.show', ['id' => $prokers->id])}}" class="fa fa-eye"> view </a>
											<form
											method="POST"
											action="{{route('manage-program-kerja.destroy', ['id' => $prokers->id] )}}"
											class="d-inline"
											onsubmit="return confirm('Hapus proker ?');"
											>
											@csrf
											<input type="hidden" name="_method" value="DELETE">
											<input type="submit" value="Delete" class="btn btn-danger">
										</form></td>
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
			</div>
		</div>
	</div>
	@endsection