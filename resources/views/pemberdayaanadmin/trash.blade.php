@extends('layouts.global')
@section('title') Trashed Books @endsection
@section('content')
<div class="container col-sm-12">
<div class="row">
	<div class="col-md-12">
		@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
		@endif
		<h2>Trash</h2>
		<div>
		<div class="col-md-6">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="btn-primary {{Request::get('status') == NULL &&
					Request::path() == 'books' ? 'active' : ''}}" href="
					{{route('penyaluran.index')}}">All Post</a>
				</li>
				<li class="nav-item">
					<a class="btn-primary {{Request::get('status') == 'publish' ?
					'active' : '' }}" href="{{route('penyaluran.index', ['status' =>
					'publish'])}}">Publish</a>
				</li>
				<li class="nav-item">
					<a class="btn-primary {{Request::get('status') == 'draft' ?
					'active' : '' }}" href="{{route('penyaluran.index', ['status' =>
					'draft'])}}">Draft</a>
				</li>
				<li class="nav-item">
					<a class="btn-primary {{Request::path() == 'admin/penyaluran/trash' ?
					'active' : ''}}" href="">Trash</a>
				</li>
			</ul>
		</div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-md-12 text-right">
			<a
			href="{{route('penyaluran.create')}}"
			class="btn fa fa-plus btn-primary btn-flat"
			> Mulai Donasi</a>
		</div>
	</div>
	<div class="box">
            <!-- /.box-header -->
	<div class="box-body">
	<table class="table table-bordered table-stripped" id="example1" style="width: 100%">
		<thead>
			<tr>
				<th><b>No.</b></th>
				<th><b>Nama Penerima</b></th>
				<th><b>Author</b></th>
				<th><b>Jumlah</b></th>
				<th><b>Dokumentasi</b></th>
				<th><b>Action</b></th>
			</tr>
		</thead>
		<tbody>
			@php
				$no = 1;
			@endphp
			@foreach($books as $book)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$book->nama}}</td>
				<td>{{$book->created_by}}</td>
				<td>{{$book->jumlah}}</td>
				<td>
					@if($book->dokumentasi)
					<img src="{{asset('storage/' . $book->dokumentasi)}}"
					width="96px"/>
					@endif
				</td>
				<td>
					<form
					method="POST"
					action="{{route('penyaluran.restore', ['id' => $book->id])}}"
					class="d-inline"
					>
					@csrf
					<input type="submit" value="Restore" class="btn btn-success"/>
				</form>
				<form
				method="POST"
				action="{{route('penyaluran.deletepermanent', ['id' => $book->id])}}"
				class="d-inline"
				onsubmit="return confirm('Delete this book permanently?')"
				>
				@csrf
				<input type="hidden" name="_method" value="DELETE">
				<input type="submit" value="Delete" class="btn btn-danger">
			</form>
		</td>
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