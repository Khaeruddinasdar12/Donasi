@extends('layouts.global')
@section('title') List Beasiswa @endsection
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
			<h2>List Beasiswa __ Saldo Rp. {{$total}}</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('manage-beasiswa.create')}}"
						class="btn btn-primary fa fa-plus btn-flat"
						> Tambah Beasiswa</a>
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
									<th>Nama penerima</th>
									<th>Jkel</th>
									<th>Asal mitra</th>
									<th>Kampus</th>
									<th>Jenjang pendidikan</th>
									<th>Jumlah persemester</th>
									<th>Telah terima</th>
									<th>Lama donasi</th>
									<th>Status</th>
									<th>Cairkan beasiswa</th>
									<th>Terakhir diberikan</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($beasiswa as $beasiswas)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$beasiswas->nama_penerima}}</td>
									<td>{{$beasiswas->jkel}}</td>
									<td>{{$beasiswas->namamitra}}</td>
									<td>{{$beasiswas->kampus}}</td>
									<td>{{$beasiswas->pendidikan}}</td>
									<td>Rp. {{format_uang($beasiswas->jumlah_persemester)}}</td>
									<td>Rp. {{format_uang($beasiswas->jumlah_total)}}</td>
									<td>{{$beasiswas->lama}} semester</td>
									<td> @if($beasiswas->status == 'active')<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Active</i></span>
									 @else<span class="label label-warning" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Inactive</i></span> 
									  @endif </td>
									  <td>
									  	@if($beasiswas->status == 'active')
									<form
									method="POST"
							action="{{route('manage-beasiswa.cair', ['id' => $beasiswas->id])}}"
									class="d-inline"
									onsubmit="return confirm('Cairkan Beasiswa ?')">
									@csrf
									<input type="hidden" name="_method" value="PUT">
									<input type="submit" value="Cairkan" class="btn btn-primary">
										</form>
									
									  	@else 
									  	<form
									method="POST"
							action="{{route('manage-beasiswa.cair', ['id' => $beasiswas->id])}}"
									class="d-inline"
									onsubmit="return confirm('Cairkan Beasiswa ?')">
									@csrf
									<input type="hidden" name="_method" value="PUT">
									<input type="submit" value="Cairkan" class="btn btn-primary" disabled="">
										</form>
									  	@endif
									  </td>
									  <td>{{$beasiswas->updated_at}}</td>
									<td>
										<div class="row1">
											<a href="{{route('manage-beasiswa.edit', ['id' => $beasiswas->id])}}" class="fa fa-edit"> Edit </a>
											<a href="{{route('manage-beasiswa.show', ['id' => $beasiswas->id])}}" class="fa fa-eye"> View </a>
											<form
											method="POST"
											action="{{route('manage-beasiswa.destroy', ['id' => $beasiswas->id])}}"
											class="d-inline"
											onsubmit="return confirm('Hapus Beasiswa ?')"
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