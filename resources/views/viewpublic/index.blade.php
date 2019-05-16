<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posko Yatim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/owl.theme.default.min.css')}}" />
    
</head>
<body>
  <div class="container-fluid main">
    <nav class="navbar navbar-default navbar-fixed-top" id="twd-menu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('index')}}">Posko Yatim</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemberdayaan <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{route('view-beasiswa.index')}}">Beasiswa</a></li>
                  <li><a href="{{route('view-usaha-kecil-menengah.index')}}">Usaha Kecil Menengah</a></li>
                </ul>
            </li>
            <li><a href="{{route('view-kegiatan-infak.index')}}">Penyaluran Infak Sedekah</a></li>
            <li><a href="{{route('login')}}">Pendaftaran Donatur Tetap</a></li>
            <li><a href="{{route('about')}}">About</a></li>
          </ul>
          
          <ul class="nav navbar-nav navbar-right border">
           
            <li><a href="{{route('login')}}">Login</a></li>
           
          </ul>
        </div>
      </div>
    </nav>

    <div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner" role="listbox">
        <div class="item active background a"></div>
            <div class="item background b"></div>
            <div class="item background c"></div>
            <div class="item background d"></div>
            <div class="item background e"></div>
            <div class="item background f"></div>
            <div class="item background g"></div>
            <div class="item background h"></div>
            <div class="item background i"></div>
            <div class="item background j"></div>
            <div class="item background k"></div>
            <div class="item background l"></div>
            <div class="item background m"></div>
            <div class="item background n"></div>
            <div class="item background o"></div>
            <div class="item background p"></div>
            <div class="item background q"></div>
            <div class="item background r"></div>
            <div class="item background s"></div>
            <div class="item background t"></div>
            <div class="item background u"></div>
      </div>

      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="ti-angle-left" aria-hidden="true" ></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="ti-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    <div class="covertext">
      <div class="col-md-10" style="float:none; margin:0 auto;">
        <h2 class="subtitle">
          <span class="subs1"> "Sedekah Itu Menghapuskan Kesalahan</span> <br>
            <span class="subs2"> Seperti <span class="dana">Air
            </span> Memadamkan <span class="dana">Api</span>"</span><br>
            <h5 style="color: white;">(Hadist Riwayat At Tirmidzi)</h5>
        </h2>
      </div>
      <div class="col-md-12 dana">
        <a href="{{route('donasi-sekarang.create')}}">
          <button type="button" class="btn btn-lg danabtn">
            Mulai Donasi
            <span class="ti-arrow-right"></span>
          </button>
        </a>
      </div>
      <div class="row count">
        <div class="container">
          <div class="col-sm-4">
            <p class="text-count satu">Rp. {{format_uang($totaldonasi->total)}}</p>
            <p class="text-pesan dua">Donasi yang Terkumpul</p>
          </div>
          <div class="col-sm-4">
            <p class="text-count satu">Rp. {{format_uang($totaldonasi->total_tersalurkan)}}</p>
            <p class="text-pesan dua">Donasi yang Tersalurkan</p>
          </div>
          <div class="col-sm-4">@php
            $total = $totaldonatur + $donasiuser ;
            @endphp
            <p class="text-count tiga">{{$total}}</p>

            <p class="text-pesan empat">#OrangBaik Tergabung</p>
          </div>
      </div>
    </div>
    </div>
  </div>

  <!-- proker -->
  <div class="container box">
    <div>
      <div class="col-md-3 col-md-offset-1">
        <div class="opinion">
          <h1 class="text-left">Program Kerja Posko Yatim</h1>
          <p class="text-left fact">Kebahagiaan Mereka Adalah Cerminan Kebaikan Hati Kalian</p>
          <a href="{{route('donasi-sekarang.create')}}">
            <button type="button" class="btn btn-lg ayo">
              Ayo Berdonasi Sekarang
            </button>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-md-offset-1">
        <div class="owl-carousel owl-theme">
          @foreach($proker as $prokers)
          <div class="slide">
            <img src="{{asset('storage/' . $prokers->dokumentasi)}}"
      width="185px" >
            <div class="desc">
              <p class="text-center">
                @php echo $prokers->deskripsi; @endphp
              </p>
            </div>
            <a href="{{route('view-kegiatan-infak.index', ['cari' => $prokers->nama_kegiatan])}}">
              <span class="img-text">{{$prokers->nama_kegiatan}}</span>
            </a>
          </div>
          @endforeach
        </div>   
      </div>
    </div>
  </div>
  <!-- akhir proker -->



  <section class="section">
    <div class="container footer">
      <div class="row">
        <div class="col-lg-5 col-md-offset-1">
          <p class="brand-footer">Posko Yatim</p>
        </div>
        <div class="col-lg-4 col-md-offset-2">
          <p class="footer-txt">Temukan kami di :
            <span class="social-icons">
              <a href=https://www.instagram.com/sririnardiputra_srp/><span class="ti-instagram"></span></a>
              <a href="https://www.facebook.com/POSKO-YATIM-867929073332931/"><span class="ti-facebook"></span></a>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container end">
      <div class="row">
        <div class="col-lg-5 col-md-offset-1">
          <p class="ft">
            <span class="brand-explain">Posko Yatim</span>
            <span class="explain">
              adalah Lembaga Sosial dan keummatan yang berkhidmat dan berfokus pada upaya membantu, mencerahkan dan memberdayakan ummat terutama kaum dhuafa dan anak-anak yatim untuk menjadi ummat yang madani.
            </span>
          </p>
        </div>
        <div class="col-lg-4 col-md-offset-2 lock">
          <p class="lock-1">
            <span class="ti-location-pin mr-3"></span> Jln. Mannuruki 12 No 12 <br>Makassar, Sulawesi Selatan
          </p>
          <div>
            <p class="lock-2">
              <span class="ti-email mr-3"></span> poskoyatim@gmail.com
            </p>
          </div>
          <div>
            <p class="lock-3">
              <span class="ti-headphone-alt mr-3"></span> +62 852-5556-3983
            </p>
      </div>
    </div>
  </footer>

    <!-- script -->
    <script src="{{asset('zakat/js/jquery.min.js')}}"></script>
    <script src="{{asset('zakat/js/bootstrap.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.sticky.js')}}"></script>

    <script src="{{asset('zakat/js/owl.carousel.js')}}"></script>
    <script>
      $(function(){

      var menu = $('#twd-menu'),
        pos = menu.offset();

        $(window).scroll(function(){
          if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('navbar-default')){
            menu.fadeOut('fast', function(){
              $(this).removeClass('navbar-default').addClass('fixed').fadeIn('fast');
            });
          } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
            menu.fadeOut('fast', function(){
              $(this).removeClass('fixed').addClass('navbar-default').fadeIn('fast');
            });
          }
        });

    });
    </script>
      <script>
      $('.owl-carousel').owlCarousel({
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    </script>
</body>
</html>