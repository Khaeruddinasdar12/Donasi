@extends('layouts.viewpublic')
@section ('title')Posko yatim - beasiswa @endsection
@section('content')
    <section>
        <div class="input">
            <div class="container main-header">
                <h2 class="text-center">Informasi Penerima Beasiswa</h2>
                <h4 class="text-center">Untuk anak yatim yang berprestasi</h4>
                <div class="col-md-6 col-md-offset-3">
                      <form action="{{route('view-beasiswa.index')}}" >
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
                    @foreach($beasiswa as $beasiswas)
                    <div class="col-md-3">
                        <a href="{{route('view-beasiswa.show',['id' => $beasiswas->id])}}" class="thumbnail thumb">
                            <img src="{{asset('storage/'. $beasiswas->dokumentasi)}}" alt="...">
                            <div class="caption">
                                <h3>{{$beasiswas->nama_penerima}}</h3>
                                <h6>Asal Kampus {{$beasiswas->kampus}}</h6>
                                <p>Jumlah terima <strong>Rp. {{format_uang($beasiswas->jumlah_total)}}</strong> </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>

            </div>
            <div class="container">
                {{ $beasiswa->links() }}
            </div>
        </div>
    </section>

@endsection