<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Larashop @yield("title")</title>
    <link rel="stylesheet" href="{{asset('polished/polished.min.css')}}">
    <link rel="stylesheet" href="{{asset('polished/iconic/css/open-iconicbootstrap.
    min.css')}}">
    <style>
    .grid-highlight {
        padding-top: 1rem;
        padding-bottom: 1rem;
        background-color: #5c6ac4;
        border: 1px solid #202e78;
        color: #fff;
    }
    hr {
        margin: 6rem 0;
    }
    hr+.display-3,
    hr+.display-2+.display-3 {
        margin-bottom: 2rem;
    }
</style>
<script type="text/javascript">
    document.documentElement.className =
    document.documentElement.className.replace('no-js', 'js') +
    (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
</script>
</head>
<body>
    <nav class="navbar navbar-expand bg-warning">
        <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0"href="index.html"> Donatur Syariah </a>
        <button class="btn btn-link d-block d-md-none" data-toggle="collapse"
        data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
    </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                                              @guest
                            <li class="nav-item">
                                <a style="color: white" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color: white" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

</nav>
<div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-itemsstretch
    m-0">
    <div class="col-lg-12 col-md-12 p-4">
        @yield("content")
    </div>
</div>
</div>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min
.js" integrity="sha384-
cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
crossorigin="anonymous"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js
" integrity="sha384-
uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
crossorigin="anonymous"></script>
</body>
</html>