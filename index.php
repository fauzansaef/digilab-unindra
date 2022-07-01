<?php
	require_once "functions.php";
	check_login();
?>
<html lang="en">
   <head>
    <title>DIGILIB | Unindra</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="./assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="./assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="./assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="./assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />
	<link href="./assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> 
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="./assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
		<script src="./assets/global/plugins/select2/js/select2.js"></script>
		<script src="./assets/global/plugins/select2/js/select2.full.js"></script>
		<script src="./assets/global/plugins/select2/js/select2.full.min.js"></script>
		<script src="./assets/global/plugins/select2/js/select2.min.js"></script>

       

        <script src="./assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="./assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="./assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="./assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="./assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="./assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="./assets/script/common/autoNumeric-min.js" type="text/javascript"></script>
        <script src="./assets/script/common/autoNumeric.min.js" type="text/javascript"></script>
        <script src="./assets/script/common/bignumber.min.js" type="text/javascript"></script>
        <script src="./assets/script/common/jquery.spring-friendly.min.js" type="text/javascript"></script>
        <script src="./assets/script/common/pageHandler.js" type="text/javascript"></script>
        <script src="./assets/script/common/utility.js" type="text/javascript"></script>
		<script src="./assets/script/common/common_utils.js" type="text/javascript"></script>
		<script src="./assets/script/dashboard.js" type="text/javascript"></script>
		

</head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
         <div class="page-header navbar navbar-fixed-top">
    <!--                 BEGIN HEADER INNER -->
		<div class="page-header-inner ">
        <!--                     BEGIN LOGO -->
        <div class="page-logo">
            <a href="/perpustakaan/">
                <img src="./assets/layouts/layout/img/logo-digilib.png" alt="logo"  class="logo-default" style="margin-top: -50px; width:150px;height:150px;"> </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!--                     END LOGO 
                             BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!--                     END RESPONSIVE MENU TOGGLER 
                             BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" th:src="${userImg}" />
                        <span class="username username-hide-on-mobile" id = "username"> <?php echo "" . $_SESSION["username"] . "";?></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        
                        <li>
                            <a href="<?= BASE_URL ?>/logout.php">
                                <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
        </div>
<!--        END TOP NAVIGATION MENU -->
		</div>
<!--    END HEADER INNER -->
		</div>
            <div class="clearfix"></div>

            <div class="page-container">
             
<div class="page-sidebar-wrapper">
    <!--             BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!--        BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!--                     DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element 
                                 BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item ">
                <a href="/perpustakaan/" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>

            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-database"></i>
                    <span class="title">Data Master</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-book"></i>
                            <span class="title">Buku</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>master/buku_view.php" class="nav-link ">
                                    <span class="title">Input Data Buku</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Anggota</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>master/anggota_view.php" class="nav-link ">
                                    <span class="title">Input Data Anggota</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-exchange"></i>
                    <span class="title">Transaksi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">


                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-arrow-right"></i>
                            <span class="title">Peminjaman</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>transaksi/peminjaman_view.php" class="nav-link ">
                                    <span class="title">Input Peminjaman</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>laporan/laporan_peminjaman_view.php" class="nav-link ">
                                    <span class="title">Laporan Peminjaman</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-arrow-left"></i>
                            <span class="title">Pengembalian</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
						 <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>transaksi/pengembalian_view.php" class="nav-link ">
                                    <span class="title">Input Pengembalian</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>laporan/laporan_pengembalian_view.php" class="nav-link ">
                                    <span class="title">Laporan Pengembalian</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

   <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-info"></i>
                    <span class="title">About Us</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">           
					  <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa fa-list-alt"></i>
                            <span class="title">About Us</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
						 <li class="nav-item  ">
                                <a href="<?= BASE_URL ?>aboutus/about_us.php" class="nav-link ">
                                    <span class="title">Penjelasan Aplikasi</span>
                                </a>
                            </li>
                       

                        </ul>
                    </li>

                </ul>
            </li>
        </ul>
        <!--                 END SIDEBAR MENU 
                         END SIDEBAR MENU -->
    </div>
    <!--             END SIDEBAR -->
</div>


<div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel hidden-xs hidden-sm">


                    </div>
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">

                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h1 class="page-title"><i class="icon-home"></i>&nbsp;&nbsp;Dashboard</h1>
                    <!-- END PAGE TITLE-->

                    <!-- Packaging File-->

                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box dark" id="divDasboard">
                                    <div class="portlet-title">
                                        <h4>Selamat Datang di Perpustakaan</h4>

                                        <p>Disini tersedia berbagai jenis buku yang dapat Anda baca. Silahkan berjelajah :)</p>
                                    </div>

                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 bordered">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 id="stokBuku" class="font-green-sharp">
															
                                                               
                                                            </h3>
                                                            <small>STOK BUKU</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-book"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                        <div class="progress">
                                                            <span style="width: 100%;" class="progress-bar progress-bar-success green-sharp">
                                                                <span class="sr-only">76% progress</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="scroller-footer pull-right">
                                                            <div class="btn-arrow-link">
                                                                <a href="<?= BASE_URL ?>master/buku_view.php">MORE INFO</a>
                                                                <i class="fa fa-arrow-circle-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 bordered">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 id="totalAnggota" class="font-red-haze">
                                                              
                                                            </h3>
                                                            <small>DAFTAR ANGGOTA</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="icon-user"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                        <div class="progress">
                                                            <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                                                <span class="sr-only">85% change</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="scroller-footer pull-right">
                                                            <div class="btn-arrow-link">
                                                                <a href="<?= BASE_URL ?>master/anggota_view.php">MORE INFO</a>
                                                                <i class="fa fa-arrow-circle-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 bordered">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 id="totalPeminjaman" class="font-blue-sharp">
                                                                
                                                            </h3>
                                                            <small>DATA PEMINJAMAN</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-calendar-plus-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                        <div class="progress">
                                                            <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                                                                <span class="sr-only">45% grow</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="scroller-footer pull-right">
                                                            <div class="btn-arrow-link">
                                                                <a href="<?= BASE_URL ?>laporan/laporan_peminjaman_view.php">MORE INFO</a>
                                                                <i class="fa fa-arrow-circle-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="dashboard-stat2 bordered">
                                                    <div class="display">
                                                        <div class="number">
                                                            <h3 id="totalPengembalian" class="font-purple-soft">
                                                               
                                                            </h3>
                                                            <small>DATA PENGEMBALIAN</small>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-calendar-check-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress-info">
                                                        <div class="progress">
                                                            <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                                                                <span class="sr-only">56% change</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="scroller-footer pull-right">
                                                            <div class="btn-arrow-link">
                                                                <a href="<?= BASE_URL ?>laporan/laporan_pengembalian_view.php">MORE INFO</a>
                                                                <i class="fa fa-arrow-circle-right"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet box dark" id="divDasboard2">
                                    <div class="portlet-title">
                                        <h4>Pesan untuk Anda</h4>
                                    </div>

                                    <div class="portlet-body">

                                        <h2>Hallo, <b> <?php echo "" . $_SESSION["username"] . "";?></b></h2>

                                        <h1>Selamat Datang di DIGILIB Unindra</h1>




                                        <h4>Tetap Menyerah dan Jangan Semangat</h4>

                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


                <div class="page-content-wrapper">
                    <div class="page-content">
                        
                    </div>
                </div>


            </div>
         
<div class="page-footer">
    <div class="page-footer-inner"> 2022 &copy; Fauzan Saef & Nursyahfitri Purba
        
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

        </div> 
      
        
    </body>
</html>
