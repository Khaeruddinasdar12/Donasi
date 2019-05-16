@extends('layouts.global')
@section('title') List Mitra @endsection
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
			
			<h2>List mitra</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('manage-mitra.create')}}"
						class="btn btn-primary fa fa-plus btn-flat"
						> Tambah Mitra</a>
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
									<th>Nama mitra</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Jumlah anggota</th>
									<th>Created by</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($mitra as $mitras)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$mitras->nama}}</td>
									<td>{{$mitras->alamat}}</td>
									<td>{{$mitras->email}}</td>
									<td>{{$mitras->jumlah}}</td>
									<td>admin <strong>{{$mitras->namaadmin}}</strong></td>
									<td>
										<div class="row1">
											<a href="{{route('manage-mitra.edit', ['id' => $mitras->id])}}" class="fa fa-edit"> Edit </a>
											<form
											method="POST"
											action="{{route('manage-mitra.destroy', ['id' => $mitras->id] )}}"
											class="d-inline"
											onsubmit="return confirm('Hapus mitra ?');"
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