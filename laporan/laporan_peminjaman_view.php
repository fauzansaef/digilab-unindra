<?php
	require_once "../functions.php";
	check_login();
	 $menu = 'data_transaksi';
	 $submenu = 'peminjaman';
	 $page = 'laporan_peminjaman_view';
?>

<html lang="en">
    <head>
	<?php include "../contents/header.php";?>
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
           <?php include "../contents/navigation.php";?>
            <div class="clearfix"></div>

            <div class="page-container">
                <?php include "../contents/sidebar.php";?>

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
            <h1 class="page-title"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;Laporan Peminjaman Buku</h1> 
            <!-- END PAGE TITLE-->


            <div class="page-content-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box dark">
                            <div class="portlet-title">

                            </div>

                            <div class="portlet-body">
                                <form  class="form-horizontal">
                                   
                                    <div id="sample_1_2_wrapper" class="dataTables_wrapper">

                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable" id="tblLaporanPeminjaman" role="grid" aria-describedby="sample_1_2_info">

                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> No </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Tanggal Peminjaman </th>													
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Tanggal Pengembalian </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Kode Buku </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Nama Buku </th>
													<th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Nama Peminjam </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Petugas </th>
													<th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Status </th>														
                                                </tr>
                                            </thead>
                                        </table>

                                    

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
          <?php include "../contents/footer.php";?>
        </div> 
      
        
    </body>
</html>
