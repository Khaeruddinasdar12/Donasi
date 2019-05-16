@extends('layouts.donatur')
@section ('title')Posko yatim - daftar donatur @endsection
@section('content')
    <section>
        <div class="dashboard">
            <div class="container">
                <div class="col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="{{asset('storage/'. Auth::user()->foto) }}" alt="background-user">
                    </a>
                    <div class="list-group">
                        <a href="{{route('donatur.dashboard')}}" class="list-group-item">Overview</a>
                        <a href="{{route('donasi.donatur')}}" class="list-group-item">Donasi Sekarang</a>
                        <a href="{{route('edit.profile')}}" class="list-group-item">Edit Profil</a>
                        <a href="{{route('daftar.donatur')}}" class="list-group-item active">Lihat daftar donatur</a>
                        <a href="{{route('daftar.mitra')}}"class="list-group-item">Lihat daftar mitra Posko Yatim</a>
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
                    <h2 style="margin-top:40px;">Daftar donatur di Posko Yatim</h2><hr style="background-color:#01579b; height:3px; border-radius:5px;">
                    <table id="example" class="table table-bordered table-stripped">
                        <thead style="background-color: #01579b; color:#ffffff;">
                            <tr>			
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>Jumlah Donasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donatur as $donaturs)
                            <tr>				
                                <td>{{$donaturs->name}}</td>
                                <td>{{$donaturs->email}}</td>
                                <td>{{$donaturs->pekerjaan}}</td>
                                <td>{{$donaturs->alamat}}</td>
                                <td>Rp. {{format_uang($donaturs->totaldonasi)}}</td>
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