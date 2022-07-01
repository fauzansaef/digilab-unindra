<?php
	require_once "../functions.php";
	check_login();
	 $menu = 'data_transaksi';
	 $submenu = 'peminjaman';
	 $page = 'peminjaman_view';
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
                    <h1 class="page-title"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;Peminjaman Buku</h1>
                    <!-- END PAGE TITLE-->

                    <!-- Packaging File-->

                    <div class="page-content-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box dark" id="divTablePackaging">
                                    <div class="portlet-title">

                                    </div>

                                    <div class="portlet-body">
                                        <form class="form-horizontal" id="frmPackaging">
                                            <div class="table-toolbar">
                                                <div class="form-group">

                                                    <div class="col-md-12">
                                                        <button id="btnTambahPeminjaman" class="btn sbold grey-mint" style="float :right"> <i class="fa fa-plus"></i>&nbsp; Proses Peminjaman</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="sample_1_2_wrapper" class="dataTables_wrapper">

                                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable" id="tblPeminjaman" role="grid" aria-describedby="sample_1_2_info">

                                                    <thead>
                                                        <tr role="row">
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> No</th>
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Tanggal Peminjaman </th>
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Tanggal Pengembalian </th>
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Kode Buku  </th>
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Nama Buku </th>
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Nama Peminjam </th>
                                                            <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Petugas </th>
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
        <?php include "../contents/footer.php"; ?>
    </div>


</body>

</html>

<div id="inputPeminjamanModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Input Peminjaman</h4>
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal">
                    <div class="form-body">
                        
						
						
						 <div class="form-group">
                            <label class="col-md-3 control-label">Nama Peminjam</label>
                            <div class="col-md-4">
							
	
							
								<select id="selectAnggota"  style="width: 100%" class="form-control select2me">
                                           
       
 
                                          
                                </select>
                            </div>
                        </div>
						
						
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Tanggal Pinjam</label>
                            <div class="col-md-4">
                                <input type="date" id="txtTglPinjam" class="form-control" placeholder="Tanggal Pinjam">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">Tanggal Kembali</label>
                            <div class="col-md-4">
                                <input type="date" id="txtTglKembalikan" class="form-control" placeholder="Tanggal Kembali">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">ID Buku</label>
                            <div class="col-md-4">
                                <select id="selectBuku" style="width: 100%" class="form-control select2me">
                                   
                                     
									 
									 
									 
                                      
                                  
                                </select>
                            </div>
                        </div>

                       

                        

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-4">
                                <button type="button" id="btnSimpanPeminjaman" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

