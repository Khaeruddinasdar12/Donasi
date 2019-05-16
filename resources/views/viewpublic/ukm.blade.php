@extends('layouts.viewpublic')
@section ('title')Posko yatim - ukm @endsection
@section('content')
    <section>
        <div class="input">
            <div class="container main-header">
                <h2 class="text-center">Informasi Penerima Dana UKM</h2>
                <h4 class="text-center">Bagi kaum dhuafa untuk modal membuka usaha kecil</h4>
                <div class="col-md-6 col-md-offset-3">
                      <form action="{{route('view-usaha-kecil-menengah.index')}}" >
                            @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" value="{{Request::get('cari')}}" placeholder="Cari nama penerima...">
                        <span class="input-group-btn">
                            <input class="btn btn-default" type="submit" value="Go">
                        </span>
                        </form>
                    </div>
                </div>
          
            </div>
            <div class="container main-header">
                <hr style="background-color:#e2dede; height:1px;">
                <div>
                    @foreach($ukm as $ukms)
                    <div class="col-md-3">
                        <a href="{{route('view-usaha-kecil-menengah.show', ['id' => $ukms->id])}}" class="thumbnail thumb">
                            <img src="{{asset('storage/'. $ukms->dokumentasi)}}" alt="...">
                            <div class="caption">
                                <h3>{{$ukms->nama_penerima}}</h3>
                                <p>Telah terima <strong>Rp. {{format_uang($ukms->jumlah_total)}}</strong></p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="container">
                {{ $ukm->links() }}
            </div>
        </div>
    </section>
@endsection