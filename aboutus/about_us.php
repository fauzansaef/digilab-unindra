<?php
	require_once "../functions.php";
	check_login();
	$menu = 'aboutus';
	$submenu = 'about_us';
	$page = 'about_us_view';
?>

<html lang="en">

<head>
    <?php include "../contents/header.php"; ?>
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <?php include "../contents/navigation.php"; ?>
        <div class="clearfix"></div>

        <div class="page-container">
            <?php include "../contents/sidebar.php"; ?>

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
                    <h1 class="page-title"><i class="fa fa-book"></i>&nbsp;&nbsp;About As</h1>
                    <!-- END PAGE TITLE-->

                    <!-- Packaging File-->

                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box dark">
                                    <div class="portlet-title">

                                    </div>

                                    <div class="portlet-body">
                                        <form class="form-horizontal" style="margin-left: 50px;>
                                            <div class="table-toolbar">
                                                <div class="form-group">
                                                    <h4><b>DIGILIB Unindra</b></h4>
                                                    <p>Aplikasi Website ini memuat proses transaksi peminjaman dan pengembalian buku yang terjadi di perpustakaan.</p>

                                                    <h5><b>Fauzan Saef - 202143570038</b></h5>
                                                    <ul>Konstibusi
                                                        <li>Pembuatan Database</li>
                                                        <li>Pembuatan Login dan Session</li>
                                                        <li>Pembuatan CRUD Tab Menu Master Anggota</li>
                                                        <li>Pembuatan Tab Menu Transaksi Pengembalian</li>
                                                        <li>Pembuatan Tab Menu Laporan Pengembalian</li>
                                                        
                                                    </ul>

                                                    <h5><b>Nursyahfitri Purba - 202043579104</b></h5>
                                                    <ul>Konstibusi
                                                        <li>Pembuatan CRUD Tab Menu Master Buku</li>
                                                        <li>Pembuatan Tab Menu Transaksi Peminjaman</li>
														<li>Pembuatan Tab Menu Laporan Peminjaman</li>
                                                        <li>Pembuatan Tab Menu Dashboard</li>
                                                        <li>Pembuatan Tab Menu About Us</li>											
                                                    </ul>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include "../contents/footer.php"; ?>
    </div>


</body>

</html>