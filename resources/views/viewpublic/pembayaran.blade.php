@extends('layouts.viewpublic')
@section ('title')Posko yatim - upload bukti pembayaran @endsection
@section('content')
    <section>
        <div class="row pembayaran">
            <div class="container">
                <div class="col-md-5 col-md-offset-4">
                    <div class="panel panel-default" style="padding:30px;">
                       
                        <div class="panel-body">
                            @if(session('status'))
                            <div class="alert alert-danger">{{session('status')}} </div>
                            @elseif(session('gagal'))
                            <div class="alert alert-danger">{{session('gagal')}} </div>
                            @endif
                             @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Foto minimal 2MB<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                            <p class="text-center text">Upload bukti transfer</p>
                            <div class="form-group">
                                <form action="{{route('proses.donasi')}}" method="POST" enctype="multipart/form-data" accept="image/*">
                                    @csrf
                                <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Masukkan kode unik anda" name="id" onkeypress="return isNumberKey(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Bukti Transfer</label>
                                <input type="file" id="exampleInputFile" name="photo" accept="image/*" required>
                                <p class="help-block" >Bukti transfer</p>
                            </div>
                            <!-- <input type="hidden" name="_method" value="PUT" > -->
                                <button type="submit" class="btn btn-default upload" style="margin-left: 60px;">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection