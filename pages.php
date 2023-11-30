<?php
session_start();
include 'konek.php';
$level = "pemohon";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>GPdI Bukit Zaitun Oesapa</title>
    <!-- core CSS -->
    <link href="main/css/bootstrap.min.css" rel="stylesheet">
    <link href="main/css/font-awesome.min.css" rel="stylesheet">
    <link href="main/css/animate.min.css" rel="stylesheet">
    <link href="main/css/owl.carousel.css" rel="stylesheet">
    <link href="main/css/owl.transitions.css" rel="stylesheet">
    <link href="main/css/prettyPhoto.css" rel="stylesheet">
    <link href="main/css/main.css" rel="stylesheet">
    <link href="main/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="main/img/gpdi.png" width="90" height="74" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="index.php">Beranda</a></li>
                        <li class="scroll"><a href="pages.php">Tentang Kami</a></li>
                        <li class="scroll"><a href="index.php#features">Pelayanan</a></li>
                        <li class="scroll"><a href="index.php#services">Informasi</a></li>
                        <li class="scroll"><a href="index.php#get-in-touch">Lokasi</a></li>
                        <li class="scroll"><a href="pendaftaran.php">Pendaftaran jemaat</a></li>
                        <li class="scroll"><a href="po-admin.php">Login</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->

    <section id="A">
        <div class="container">
            <div class="section-header">
                <br>
                <h3 class="section-title text-center wow fadeInDown"> TENTANG GEREJA</h3>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft"> 
                    <div class="card">
                      <h3 class="card-header">SEJARAH SINGKAT</h3>
                      <div class="card-body">
                        <h5 class="card-title">GPdI Bukit Zaitun</h5>
                        <p class="card-text">Sejarah yaitu ilmu yang menyelidiki perkembangan-perkembangan mengenai peristiwa dan kejadian di masa lampau. Sejarah merupakan kejadian dan peristiwa yang berhubungan dengan manusia, yang menyangkut perubahan nyata di dalam kehidupan manusia. Sejarah merupakan cerita yang tersusun secara sistematis (teratur dan rapi).[CONTOH]
                        </p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                      </div>
                    </div>
                </div>
                <div class="col-sm-6">
                <div class="card">
                      <h3 class="card-header">STRUKTUR KEPEMIMPINAN</h3>
                      <div class="card-body">
                        <h5 class="card-title">GPdI Bukit Zaitun</h5>
                        <p class="card-text">
                    <img class="img-responsive" src="main/img/struktur.png" alt=""> 
                    <a target="_blank" href="main/img/struktur.png">Lihat>></a> 
                        </p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="B">
        <div class="container">
            <br>
            <div class="section-header">
                <h3 class="section-title text-center wow fadeInDown">Visi dan Misi</h3>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <!-- <img src="main/img/number.png" alt=""> -->
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">VISI</h4>
                                <p>Bisa dikatakan visi menjadi tujuan masa depan suatu organisasi atau lembaga. Ia berisi pikiran-pikiran yang terdapat di dalam benak para pendiri. Pikiran-pikiran itu adalah gambaran dari masa depan dari organisasi yang ingin dicapai.[CONTOH]
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="features">
                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <!-- <img src="main/img/number3.png" alt=""> -->
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">MISI</h4>
                                <p>Maka bisa dikatakan misi adalah suatu proses atau tahapan yang seharusnya dilalui oleh suatu lembaga atau instansi atau organisasi dengan tujuan bisa mencapai visi tersebut. Di samping itu, misi juga dapat diartikan sebagai suatu deskripsi atau tujuan mengapa sebuah instansi atau organisasi berada di masyarakat.[CONTOH]

                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                </div>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->

    <section id="C">
        <div class="container">
            <br>
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">LOKASI</h2>
            </div>
        </div>
    </section>
    <!--/#get-in-touch-->


    <section id="contact">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.4712814452555!2d123.65797537503302!3d-10.142293089970476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c5683086e038177%3A0x5236f32218cab00b!2sGereja%20Pentakosta.%20Jemaat%20Bukit%20Zaitun!5e0!3m2!1sid!2sid!4v1699283765921!5m2!1sid!2sid" width="1350" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y'); ?> GPdI BUKIT ZAITUN OESAPA
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script src="main/js/jquery.js"></script>
    <script src="main/js/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="main/js/owl.carousel.min.js"></script>
    <script src="main/js/mousescroll.js"></script>
    <script src="main/js/smoothscroll.js"></script>
    <script src="main/js/jquery.prettyPhoto.js"></script>
    <script src="main/js/jquery.isotope.min.js"></script>
    <script src="main/js/jquery.inview.min.js"></script>
    <script src="main/js/wow.min.js"></script>
    <script src="main/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>

</html>