<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/datatables.bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/jquery.datatables.css')}}" />
     <link rel="stylesheet" href="{{asset('zakat/css/row.datatabe.min.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/responsive.datatable.min.css')}}" />
    
</head>
<body>
    <div class="container-fluid main">
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('donatur.index')}}">Posko Yatim</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemberdayaan <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('beasiswa.index')}}">Beasiswa</a></li>
                                <li><a href="{{route('usaha-kecil-menengah.index')}}">Usaha Kecil Menengah</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('kegiatan-infak.index')}}">Penyaluran Infak Sedekah</a></li>
                        <li><a href="{{route('donatur-about')}}">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('donatur.dashboard')}}">Dashboard</a></li>
                                <li>
                  <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

@yield('content')
    <script src="{{asset('zakat/js/datatable.rowrecorder.min.js')}}"></script>
    <script src="{{asset('zakat/js/table.responsive.min.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.min.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.datatables.js')}}"></script>
    <script src="{{asset('zakat/js/bootstrap.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.mask.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            } );
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
    <script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
        }

        function isDecimalKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 46 || charCode > 57))
                return false;

            return true;
        }

        function isUpperKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90))
                return false;

            return true;
        }
</script>
<!-- <script type="text/javascript">
    $(document).ready(function(){
                // Format mata uang.
        $( '#uang' ).mask('000.000.000', {reverse: true});
    })
</script> -->
</body>
</html>