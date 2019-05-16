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
                <div class="col-md-5 col-md-offset-1"><img src="img/payment-method.png" alt="working" class="img-responsive"></div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="text-center text">Mulai Berdonasi</p>
                            <form action="verifikasi.php" method="POST">
                                <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap Anda" required>
                                    </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kontak" onkeypress="return isNumberKey(event)" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Pekerjaan Anda" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp</div>
                                        <input type="text" class="form-control" id="uang" placeholder="0" onkeypress="return isNumberKey(event)" required>
                                    </div>
                                    <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nominal Donasi"  min=10000 required> -->
                                </div>
                                <button type="submit" class="btn btn-default submit">Lanjut Pembayaran</button>
                            </form>
                            <p class="text-center">Sudah melakukan donasi? <span><a href="pembayaran.php">klik disini</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.mask.min.js"></script>
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
<script type="text/javascript">
    $(document).ready(function(){
                // Format mata uang.
        $( '#uang' ).mask('000.000.000', {reverse: true});
    })
</script>
</body>
</html>