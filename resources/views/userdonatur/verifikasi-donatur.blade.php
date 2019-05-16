@extends('layouts.donatur')
@section ('title')Posko yatim - info transfer @endsection
@section('content')
    <section>
        <div class="dashboard">
            <div class="container">
                <div class="col-md-3 col-md-offset-1">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('storage/'. Auth::user()->foto) }}" alt="background-user">
                    </a>
                    <div class="list-group">
                        <a href="{{route('donatur.dashboard')}}" class="list-group-item">Overview </a>
                        <a href="{{route('donasi.donatur')}}" class="list-group-item active">Donasi Sekarang</a>
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
                <div class="col-md-6 col-md-offset-1">
                    <div class="panel panel-default" style="padding:30px;">
                        <div class="panel-body">
                            <p class="text-center text">Instruksi pembayaran</p>
                            <p class="text-center">Transfer yang akan anda lakukan berjumlah</p>
                            <h2 class="text-center">Rp. {{format_uang($jumlah->jumlah)}}</h2>
                            <a href="{{route('pembayaran.donatur',['id' => $jumlah->id])}}" >
                               
                                <!-- <input type="hidden" name="_method" value="PUT"> -->
                                <button type="submit" class="btn btn-default verif">Verifikasi pembayaran</button>
                            </a>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="text-center transfer">Transfer ke rekening a/n <b>Posko Yatim</b> berikut ini :</p>
                            <div class="cobtainer">
                                <div class="row border">
                                    <div class="col-md-5 col-md-offset-1">
                                        <img src="{{asset('zakat/img/bri.png')}}" alt="BRI" class="img-responsive bri">
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-center norek">7078 01 006711 53 4</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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


