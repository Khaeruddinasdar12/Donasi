<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posko Yatim</title>
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Posko Yatim</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemberdayaan <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="beasiswa.php">Beasiswa</a></li>
                                <li><a href="ukm.php">Usaha Kecil Menengah</a></li>
                            </ul>
                        </li>
                        <li><a href="penyaluran-donasi.php">Penyaluran Infak</a></li>
                        <li><a href="login.php">Pendaftaran Donatur</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section>
        <div class="row input">
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default" style="padding:30px;">
                        <div class="panel-body">
                            <p class="text-center text">Instruksi pembayaran</p>
                            <p class="text-center">Transfer yang akan anda lakukan berjumlah</p>
                            <h2 class="text-center">Rp -,</h2>
                            <div class="alert alert-danger text-center">
                                <p>*kode unik : </p>
                                <h3><strong>000</strong></h3>
                                <div>*Masukkan kode unik ini saat mengirimkan bukti pembayaran</div>
                            </div>
                            <form action="pembayaran.php" method="POST">
                                <button type="submit" class="btn btn-default verif">Verifikasi pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>       
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="text-center transfer">Transfer ke rekening a/n <b>Posko Yatim</b> berikut ini :</p>
                            <div class="cobtainer">
                                <div class="row border">
                                    <div class="col-md-5 col-md-offset-1">
                                        <img src="img/bri.png" alt="BRI" class="img-responsive bri">
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-center norek">7078 01 006711 53 4</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</script>
</body>
</html>