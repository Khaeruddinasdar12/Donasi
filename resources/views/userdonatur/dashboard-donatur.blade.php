@extends('layouts.donatur')
@section ('title')Posko yatim - overview @endsection
@section('content')

<section>
        <div class="dashboard">
            <div class="container">
                <div class="col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('storage/'. Auth::user()->foto) }}" alt="background-user">
                    </a>
                    <div class="list-group">
                        <a href="dashboard-donatur.php" class="list-group-item active">
                            Overview
                        </a>
                        <a href="{{route('donasi.donatur')}}" class="list-group-item">Donasi Sekarang</a>
                        <a href="{{route('edit.profile')}}" class="list-group-item">Edit Profil</a>
                        <a href="{{route('daftar.donatur')}}" class="list-group-item">Lihat daftar donatur</a>
                        <a href="{{route('daftar.mitra')}}" class="list-group-item">Lihat daftar mitra Posko Yatim</a>
                        <a href="{{ route('logout') }}" class="list-group-item" 
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        <a data-toggle="modal" data-target="#confirm-absen" class="list-group-item" style="cursor:pointer;">Berhenti jadi donatur</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="header-dashboard">
                        <h3>
                            <img src="{{asset('zakat/img/money.png')}}" alt="money" width="90px;" style="margin-top: 20px;">
                            <strong><span>Rp. {{ format_uang(Auth::user()->totaldonasi) }}</span></strong>
                        </h3>
                        <p class="header-text">total dan donasi saya</p>
                    </div>
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">{{session('status')}}</div>
                    @endif
                    <h2 style="margin-top:40px;">Donasi Saya</h2><hr style="background-color:#01579b; height:3px; border-radius:5px;">
                    <table class="table table-striped table-bordered data">
                        <thead style="background-color: #01579b; color:#ffffff;">
                            <tr>      
                            <th>Tanggal donasi</th>      
                                <th>Jumlah donasi</th>
                                <th>Status</th>
                                
                                <th>Bukti pembayaran</th>
                                <th>Upload Bukti Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donasisaya as $donasisayas)
                            <tr>    
                            <td>{{$donasisayas->created_at}}</td>            
                                <td>Rp. {{format_uang($donasisayas->jumlah)}}</td>
                                <td>@if($donasisayas->status == 'belum')
                                    <span class="label label-danger" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Belum Terkirim</i></span>
                                    @elseif($donasisayas->status == 'proses')
                                    <span class="label label-warning" style="font-size: 13px;"><i class="fa fa-check-circle-o">Proses admin</i></span>
                                    @else 
                                    <span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o">Terkirim</i></span>
                                    @endif</td>
                                
                                <td><img src="{{asset('storage/'. $donasisayas->foto)}}" width="96px"></td>
                                <td>@if($donasisayas->status == 'belum')
                                      <a href="{{route('pembayaran.donatur', ['id' => $donasisayas->id])}}" class="d-inline btn btn-primary" 
                                            onclick="return confirm('Upload Bukti Pembayaran ?')" >
                                            Upload
                                        </a>
                                     @elseif($donasisayas->status == 'proses')
                                   <!--  <form
                                    method="POST"
                            action="{{route('pembayaran.donatur', ['id' => $donasisayas->id])}}"
                                    class="d-inline"
                                    onsubmit="return confirm('Upload Bukti Pembayaran ?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="submit" value="Upload" class="btn btn-primary">
                                        </form> -->
                                        <a href="{{route('pembayaran.donatur', ['id' => $donasisayas->id])}}" class="d-inline btn btn-primary" 
                                            onclick="return confirm('Upload Bukti Pembayaran ?')" >
                                            Upload
                                        </a>
                                    @else 
                                    <form
                                    method="POST"
                                    action=""
                                    class="d-inline">
                                    <input type="submit" value="Upload" class="btn btn-primary" disabled="">
                                        </form>
                                    @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="confirm-absen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Berhenti jadi Donatur</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin melanjutkan ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:24px; 
                                background-color: #fb0000; border-color: #fb0000;">Batal</button>
                                <form action="{{route('stop-donatur')}}" method="POST">
                                    @csrf
                                <input type="submit" name="" class="btn btn-primary btn-ok" value="Konfirmasi">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


