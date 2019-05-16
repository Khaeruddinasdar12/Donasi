@extends('layouts.viewpublic')
@section ('title')Posko yatim - info transfer @endsection
@section('content')
    <section>
        <div class="row input">
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default" style="padding:30px;">
                        <div class="panel-body">
                            <p class="text-center text">Instruksi pembayaran</p>
                            <p class="text-center">Transfer yang akan anda lakukan berjumlah</p>
                            <h2 class="text-center">Rp. {{format_uang($donasi->jumlah)}}</h2>
                            <div class="alert alert-danger text-center">
                                <p>*kode unik : </p>
                                <h3><strong>{{$donasi->id}}</strong></h3>
                                <div>*Masukkan kode unik ini saat mengirimkan bukti pembayaran</div>
                            </div>
                            <form action="{{route('bayar.donasi')}}" >
                                <button type="submit" class="btn btn-default verif">Verifikasi pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>       
                <div class="col-md-6 col-md-offset-3">
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
            </div>
        </div>
    </section>
@endsection