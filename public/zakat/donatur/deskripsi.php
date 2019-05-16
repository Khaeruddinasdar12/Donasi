<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Posko Yatim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../css/owl.carousel.min.css" />
    
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
        <div class="input judul">
            <div class="container">
                <h1 class="text-center" style="margin-top:0px;">Judul Penyaluran-donasi</h1>
                <div style="padding-top:20px;">
                    <div class="container">
                        <div class="col-md-8">
                            <img src="../img/exam.jpg" class="img-responsive img" style="margin-top:0px; width:100%;">
                            <p style="margin-top:20px; font-size:18px;">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias pariatur perspiciatis voluptas saepe aspernatur ea iste quo placeat magnam maiores fugiat nam porro est inventore veritatis sapiente, eos impedit! Distinctio.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias pariatur perspiciatis voluptas saepe aspernatur ea iste quo placeat magnam maiores fugiat nam porro est inventore veritatis sapiente, eos impedit! Distinctio.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias pariatur perspiciatis voluptas saepe aspernatur ea iste quo placeat magnam maiores fugiat nam porro est inventore veritatis sapiente, eos impedit! Distinctio.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias pariatur perspiciatis voluptas saepe aspernatur ea iste quo placeat magnam maiores fugiat nam porro est inventore veritatis sapiente, eos impedit! Distinctio.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h2 style="color:#6b6b6b;">Rp Donasi</h2>
                            <sub style="color:#6b6b6b;">Terakhir kali di donasi pada tanggal 1 januari 2019</sub><hr style="background-color:#bebebe; height:1px; border-radius:5px;">
                            <a href="donasi-donatur.php">
                                <button type="submit" class="btn btn-default now"><strong>DONASI SEKARANG</strong></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <!-- script -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
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