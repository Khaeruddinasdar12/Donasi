@extends('layouts.viewpublic')
@section ('title')Posko yatim - penyaluran infak @endsection
@section('content')
    <section>
        <div class="input">
            <div class="container main-header">
                <h2 class="text-center">Informasi Kegiatan Penyaluran Infak</h2>
                <h4 class="text-center">disalurkan kepada anak yatim dan dhuafa</h4>
                <div class="col-md-6 col-md-offset-3">
                      <form action="{{route('view-kegiatan-infak.index')}}" >
                            @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari" value="{{Request::get('cari')}}" placeholder="Cari nama kegiatan...">
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
                    @foreach($infak as $infaks)
                    <div class="col-md-3">
                        <a href="{{route('view-kegiatan-infak.show', ['id' => $infaks->id])}}" class="thumbnail thumb">
                            <img src="{{asset('storage/'. $infaks->dokumentasi)}}" alt="...">
                            <div class="caption">
                                <h3>{{$infaks->nama}}</h3>
                                <p>Dana <strong>Rp. {{format_uang($infaks->jumlah)}}</strong></p>
                            </div>
                        </a>
                    </div>
                   @endforeach
                </div>
                
            </div>
            <div class="container">
                {{ $infak->links() }}
            </div>
        </div>
    </section>

@endsection