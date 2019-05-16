<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posko Yatim - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    
</head>
<body>
    <div class="container-fluid main">
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Posko Yatim</a>
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
                            <p class="text-center text">Masuk ke akun Anda</p>
                            <form action="donatur/donatur-index.php">
                                <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email Anda" required>
                                    </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="passwordfield"" placeholder="Password" required>
                                    <span class="ti-eye"></span>
                                </div>
                                <button type="submit" class="btn btn-default masuk">MASUK</button>
                                <p class="text-center txt">Belum jadi Donatur?<span class="click" style="cursor : pointer;"><a data-toggle='modal' data-target='#confirm-add'>Daftar</a></span></p>
                            </form>
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
                        <form action="confirm-add.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti ti-user"></span></div>
                                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="Masukkan Nama Anda" required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon">@</span></div>
                                        <input type="email" class="form-control" id="exampleInputAmount" placeholder="Masukkan Email Anda" required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti ti-lock"></span></div>
                                        <input placeholder="Masukkan Password" type="password" name="pass" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.pass2.pattern = this.value;" class="form-control" id="passwordfield" required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti ti-lock"></span></div>
                                        <input placeholder="Masukkan Ulang Password" type="password" name="pass2" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" class="form-control" id="passwordfield" required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti ti-mobile"></span></div>
                                        <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Nomor Telephone" onkeypress="return isNumberKey(event)" required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti-id-badge"></span></div>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pekerjaan" required>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="ti-map-alt"></span></div>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat Anda" required>
                                    </div>
                                    <div class="input-group">
                                        <label for="exampleInputFile">Uoload Foto</label>
                                        <input type="file" id="exampleInputFile">
                                        <p class="help-block">Maximum 3MB.</p>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
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