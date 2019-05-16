<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posko Yatim - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('file/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('file/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('file/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('file/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('file/css/owl.carousel.min.css')}}" />
    
</head>
<body>
    <div class="container-fluid main">
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('index')}}">Posko Yatim</a>
                </div>
            </div>
        </nav>
    </div>
    <section>
        <div class="row login">
            <div class="container">

              

                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-12">
                                @if(session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                                @elseif(session('gagal'))
                                <div class="alert alert-danger">
                                    {{session('gagal')}}
                                </div>
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
                            </div>
                            <p class="text-center text">Masuk ke akun Anda</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Masukkan Email Anda" name="email" value="{{old('email')}}"required>
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="passwordfield" placeholder="Password" name="password" required>
                                    <span class="ti-eye"></span>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-default submit">MASUK</button>
                            </form>
                            <p class="text-center txt">Belum jadi Donatur?<span class="click" style="cursor : pointer;"><a data-toggle='modal' data-target='#confirm-add'>Daftar</a></span></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirm-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Daftar Sebagai Donatur!</h4>
                        </div>
                        <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti ti-user"></span></div>
                                    <input type="text" class="form-control" id="exampleInputAmount" placeholder="Masukkan Nama Anda" name="name" required>
                                </div>
                                <div class="input-group">
                                        <div class="input-group-addon"><span class="ti ti-user"></span></div>
                                        <input type="radio" name="jkel" value="L" required>Laki-laki
                                        <input type="radio" name="jkel" value="P" required>Perempuan
                                    </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span>@</span></div>
                                    <input type="email" class="form-control" id="exampleInputAmount" placeholder="Masukkan Email Anda" name="email" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti ti-money"></div>
                                    <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Jumlah minimal donasi perbulan" name="donasi" onkeypress="return isNumberKey(event)" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti ti-lock"></span></div>
                                    <input placeholder="Masukkan Password" type="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.pass2.pattern = this.value;" class="form-control" id="passwordfield" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti ti-lock"></span></div>
                                    <input placeholder="Masukkan Ulang Password" type="password" name="pass2" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" class="form-control" id="passwordfield" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti ti-mobile"></span></div>
                                    <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Nomor Telephone" name="phone" onkeypress="return isNumberKey(event)" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti-id-badge"></span></div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pekerjaan" name="job" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="ti-map-alt"></span></div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat Anda" name="address" required>
                                </div>
                                <div class="input-group">
                                    <label for="exampleInputFile">Upload Foto</label>
                                    <input type="file" id="exampleInputFile" name="file" accept="image/*" required>
                                    <p class="help-block" name="file" >Maximum 2MB.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default submit-mod" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-default submit-mod-tambah">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- script -->
    <script src="{{asset('file/js/jquery.min.js')}}"></script>
    <script src="{{asset('file/js/bootstrap.js')}}"></script>
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

        $("#passwordfield").on("keyup",function(){
            if($(this).val())
                $(".ti-eye").show();
            else
                $(".ti-eye").hide();
        });
        $(".ti-eye").mousedown(function(){
            $("#passwordfield").attr('type','text');
        }).mouseup(function(){
            $("#passwordfield").attr('type','password');
        }).mouseout(function(){
            $("#passwordfield").attr('type','password');
        });

    </script>
</body>
</html>