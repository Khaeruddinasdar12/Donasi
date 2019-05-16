@extends('layouts.viewpublic')
@section ('title')Posko yatim - donasi sekarang @endsection
@section('content')
<section>
    <div class="row input">
        <div class="container">
            <div class="col-md-5 col-md-offset-1"><img src="{{asset('zakat/img/payment-method.png')}}" alt="working" class="img-responsive"></div>
            <div class="col-md-4 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('status'))
                        <div class="alert alert-success">{{session('status')}} </div>
                        @elseif(session('gagal'))
                        <div class="alert alert-danger">{{session('gagal')}} </div>
                        @endif
                        <p class="text-center text">Mulai Berdonasi</p>
                        <form action="{{route('donasi-sekarang.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap Anda" name="nama" value="{{old('nama')}}" required>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <label>
                                  <input type="radio" name="jkel" value="L" class="minimal" required>Laki-laki
                              </label>
                              <label>
                                  <input type="radio" name="jkel" value="P" class="minimal" required>Perempuan
                              </label>
                          </div>
                          
                          <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{old('email')}}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kontak" name="nohp" value="{{old('nohp')}}" onkeypress="return isNumberKey(event)" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pekerjaan Anda" name="pekerjaan" value="{{old('pekerjaan')}}" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                            <div class="input-group">
                                <div class="input-group-addon">Rp</div>
                                <input type="text" class="form-control" name="jumlah" id="uang" placeholder="0"  onkeypress="return isNumberKey(event)" value="{{old('jumlah')}}" required>
                            </div>
                            <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nominal Donasi"  min=10000 required> -->
                        </div>
                        <input type="submit" class="btn btn-default submit"value="Lanjut Pembayaran">
                    </form>
                    <p class="text-center">Sudah melakukan donasi? <span><a href="{{route('bayar.donasi')}}">klik disini</a></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection