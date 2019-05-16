@extends('layouts.global')
@section('title') List Ukm @endsection
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
			<h2>List Ukm__ Saldo Rp. {{$total}}</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('ukm.create')}}"
						class="btn btn-primary fa fa-plus btn-flat"
						> Tambah UKM</a>
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
									<th>Nama usaha</th>
									<th>jumlah awal</th>
									<th>jumlah terima</th>
									<th>Lama donasi</th>
									<th>Tambah donasi</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ukm as $ukms)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$ukms->nama_penerima}}</td>
									<td>{{$ukms->nama_usaha}}</td>
									<td>Rp. {{format_uang($ukms->jumlah_awal)}}</td>
									<td>Rp. {{format_uang($ukms->jumlah_total)}}</td>
									<!--<td>@if($ukms->status == 'active') <span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Active</i></span>-->
									<!-- @else<span class="label label-warnign" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Inactive</i></span> -->
									<!--  @endif </td>-->
									<td>{{$ukms->lama}} tahun</td>
									<td><button class="btn btn-warning" data-toggle='modal' data-target='#tambahdonasi' style="cursor: pointer;">Tambah Donasi</button></td>
									<td>
										<div class="row1">
											<a href="{{route('ukm.edit',['id' => $ukms->id])}}" class="fa fa-edit"> Edit </a>
											<a href="{{route('ukm.show',['id' => $ukms->id])}}" class="fa fa-eye"> View </a>
											<form
											method="POST"
											action="{{route('ukm.destroy',['id' => $ukms->id])}}"
											class="d-inline"
											onsubmit="return confirm('Hapus ukm 	?')"
											>
											@csrf
											<input type="hidden" name="_method" value="DELETE">
											<input type="submit" value="Delete" class="btn btn-danger">
										</form>
										</div>
									</td>
								</tr>
								<div class="modal fade" id="tambahdonasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Donasi !</h4>
                        </div>
                        <form action="{{route('ukm.cair',['id' => $ukms->id])}}" method="POST"
                         enctype="multipart/form-data">
                        	@csrf
                            <div class="modal-body">
                            	<label>Jumlah tambahan donasi</label><br>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti-map-alt"></span></div>
                                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tambahan donasi" name="tambah_donasi" required>
                                    </div>
                                    <br>
                                    <label>Jumlah tambahan tahun</label><br>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti-map-alt"></span></div>
                                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukkan jumlah tahun" name="lama" required>
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default submit-mod" data-dismiss="modal">Batal</button>
                                <input type="hidden" name="_method" value="PUT">
                                <input type="submit" class="btn btn-default submit-mod-tambah" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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