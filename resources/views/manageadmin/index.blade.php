@extends('layouts.global')
@section('title') List Admin @endsection
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
			<h2>List Admin</h2>
		</div>
		<div class="row mb-3">
			<div class="col-md-12 text-right">
				<a
				href="{{route('manageadmin.create')}}"
				class="btn fa fa-plus btn-primary btn-flat"
				> Create Admin</a>
			</div>
		</div>

		@php
		$no = 1;
		@endphp
		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-stripped table-bordered" id="example1" style="width: 100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Jkel</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($admin as $admins)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$admins->name}}</td>
							<td>{{$admins->jkel}}</td>
							<td>
							<a href="{{route('manageadmin.show',['id'=>$admins->id])}}" class="fa fa-eye" >view </a>
							<a href="{{route('manageadmin.edit',['id'=>$admins->id])}}" class="fa fa-edit">edit </a>
							
							<form
							method="POST"
							action="{{ route('manageadmin.destroy', ['id'=> $admins->id]) }}"
							class="d-inline"
							onsubmit="return confirm('Delete this Account permanently?')"
							>
							@csrf
							<input type="hidden" name="_method" value="DELETE">
							<input type="submit" value="Delete" class="btn btn-danger btn-flat">
						</form>
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