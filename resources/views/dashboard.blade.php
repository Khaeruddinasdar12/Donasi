@extends('layouts.global')
@section('title') Dashboard @endsection

 @section('content')
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$totaldonatur}} orang</h3>

              <p>Jumlah Donatur tetap</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('manageuser.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <div class="col-lg-3 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$user}} orang</h3>

              <p>Donatur tidak tetap</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="admin/manage-donasi-user?status=sampai" class="small-box-footer" >More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Rp. {{$totaldonasi}}</h3>

              <p>Saldo</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/admin" class="small-box-footer" onclick="penghasilan('{{$totaldonasi}}')">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
      </div>
    </section>
    <script type="text/javascript">
      function penghasilan(total){
        alert("Penghasilan Rp." + total);
      }
    </script>
    <!-- /.content -->
 @endsection