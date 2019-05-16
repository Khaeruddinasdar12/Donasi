<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posko Yatim - Overview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../css/datatables.bootstrap.css" />
    <link rel="stylesheet" href="../css/jquery.datatables.css" />
    
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
                    <a class="navbar-brand" href="donatur-index.php">Posko Yatim</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemberdayaan <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="beasiswa.php">Beasiswa</a></li>
                                <li><a href="ukm.php">Usaha Kecil Menengah</a></li>
                            </ul>
                        </li>
                        <li><a href="penyaluran-donasi.php">Penyaluran Infak</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nama Donatur <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="dashboard-donatur.php">Dashboard</a></li>
                                <li><a href="../index.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section>
        <div class="dashboard">
            <div class="container">
                <div class="col-md-3 col-md-offset-1">
                    <a href="#" class="thumbnail">
                        <img src="../img/material.jpg" alt="background-user">
                    </a>
                    <div class="list-group">
                        <a href="dashboard-donatur.php" class="list-group-item">
                            Overview
                        </a>
                        <a href="donasi-donatur.php" class="list-group-item active">Donasi Sekarang</a>
                        <a href="edit-profil.php" class="list-group-item">Edit Profil</a>
                        <a href="daftar-donatur.php" class="list-group-item">Lihat daftar donatur</a>
                        <a href="daftar-mitra.php" class="list-group-item">Lihat daftar mitra Posko Yatim</a>
                        <a href="../index.php" class="list-group-item">Log out</a>
                        <a data-toggle="modal" data-target="#confirm-absen" class="list-group-item" style="cursor:pointer;">Berhenti jadi donatur</a>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="panel panel-default" style="padding:30px;">
                        <div class="panel-body">
                            <p class="text-center text">Instruksi pembayaran</p>
                            <p class="text-center">Transfer yang akan anda lakukan berjumlah</p>
                            <h2 class="text-center">Rp -,</h2>
                            <form action="pembayaran-donatur.php" method="POST">
                                <button type="submit" class="btn btn-default verif">Verifikasi pembayaran</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="text-center transfer">Transfer ke rekening a/n <b>Posko Yatim</b> berikut ini :</p>
                            <div class="cobtainer">
                                <div class="row border">
                                    <div class="col-md-5 col-md-offset-1">
                                        <img src="../img/bri.png" alt="BRI" class="img-responsive bri">
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-center norek">7078 01 006711 53 4</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="confirm-absen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Berhenti jadi Donatur</h4>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin melanjutkan ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:24px; 
                                background-color: #fb0000; border-color: #fb0000;">Batal</button>
                                <a class="btn btn-primary btn-ok">Konfirmasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- script -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.datatables.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
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
<script type="text/javascript">
    $(document).ready(function(){
                // Format mata uang.
        $( '#uang' ).mask('000.000.000', {reverse: true});
    })
</script>
</body>
</html>