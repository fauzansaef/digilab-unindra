<?php
	require_once "../functions.php";
	check_login();
	 $menu = 'data_master';
	 $submenu = 'master';
	 $page = 'buku_view';
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
            <h1 class="page-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Data Buku Perpustakaan</h1> 
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
                                <form  class="form-horizontal" id="frmPackaging">
                                    <div class="table-toolbar" >
                                        <div class="form-group" >
                                            
                                            <div class="col-md-12">
                                                  <button id="btnTambahBuku" class="btn sbold grey-mint" style="float :right">  <i class="fa fa-plus"></i>&nbsp; Tambah Buku</button>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div id="sample_1_2_wrapper" class="dataTables_wrapper">

                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable" id="tblBuku" role="grid" aria-describedby="sample_1_2_info">

                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> ID Buku </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Kode Buku </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Judul Buku </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Penulis Buku </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Penerbit Buku </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Tahun Penerbit </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Stok </th>
													<th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;">  </th>
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

<div id="inputBukuModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Input Buku</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                      
										<div class="form-group">
                                            <label class="col-md-3 control-label">Kode Buku</label>
                                            <div class="col-md-4">
                                           <select class="table-group-action-input form-control input-inline" name ="ddlKodeBuku" id="ddlKodeBuku">
												<option selected>Pilih Kode Buku</option>
												<option value="BUK01-Bacaan Fiksi">BUK01</option>
												<option value="BUK02-Bacaan Non-Fiksi">BUK02</option>
												<option value="BUK03-Bacaan Fiksi-Ilmiah">BUK03</option>
                                                <option value="BUK04-Ilmiah<">BUK04</option>
											</select>
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Judul Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="txtJudulBuku" class="form-control" placeholder="Judul Buku">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Penulis Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="txtPenulisBuku" class="form-control" placeholder="Penulis Buku">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Penerbit Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="txtPenerbitBuku" class="form-control" placeholder="Penerbit Buku">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 control-label">Tahun Penerbit</label>
                                            <div class="col-md-4">
                                                <input type="date" id="txtTahunPenerbit" class="form-control" placeholder="Tahun Penerbit">
                                            </div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label class="col-md-3 control-label">Stok</label>
                                            <div class="col-md-4">
                                                <input type="text" id="txtStok" class="form-control" placeholder="Stok">
                                            </div>
                                        </div>
								
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <button type="button" id="btnSimpanBuku" class="btn btn-primary">Submit</button>
                                                <button type="button"  class="btn default" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
			</div>

            <div id="updateBukuModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Update Buku</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-horizontal">
                                    <div class="form-body">  
									
									 <div class="form-group" hidden>
                                            <label class="col-md-3 control-label">Id Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updIdBuku" class="form-control" readonly>
                                            </div>
                                        </div>

									
									
										<div class="form-group">
                                            <label class="col-md-3 control-label">Kode Buku</label>
                                            <div class="col-md-4">
                                           <select class="table-group-action-input form-control input-inline" name ="updDdlKodeBuku" id="updDdlKodeBuku">
                                                <option selected>Pilih Kode Buku</option>
												<option value="BUK01-Bacaan Fiksi">BUK01</option>
												<option value="BUK02-Bacaan Non-Fiksi">BUK02</option>
												<option value="BUK03-Bacaan Fiksi-Ilmiah">BUK03</option>
                                                <option value="BUK04-Ilmiah<">BUK04</option>
											</select>
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Judul Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updJudulBuku" class="form-control" placeholder="Judul Buku">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Penulis Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updPenulisBuku" class="form-control" placeholder="Penulis Buku">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Penerbit Buku</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updPenerbitBuku" class="form-control" placeholder="Penerbit Buku">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 control-label">Tahun Penerbit</label>
                                            <div class="col-md-4">
                                                <input type="date" id="updTahunPenerbit" class="form-control" placeholder="Tahun Penerbit">
                                            </div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label class="col-md-3 control-label">Stok</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updStok" class="form-control" placeholder="Stok">
                                            </div>
                                        </div>
								
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <button type="button" id="btnUpdateBuku" class="btn btn-primary">Submit</button>
                                                <button type="button"  class="btn default" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
			</div>
			
			<div id="viewBukuModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Buku</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"><b>Kode Buku :</b></label>
                                            <div class="col-md-9">
                                                <label id="lblKodeBuku" class="control-label"></label>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label"><b>Judul Buku :</b></label>
                                            <div class="col-md-9">
												<label id="lblJudulBuku" class="control-label"></label>
                                            </div>
                                        </div>
										
                                        <div class="form-group">
										 <label class="col-md-3 control-label"><b>Penulis Buku :</b></label>
											<div class="col-md-9">
												<label id="lblPenulisBuku" class="control-label"></label>
											</div>											
                                        </div>
										
										
										 <div class="form-group">
                                           <label class="col-md-3 control-label"><b>Penerbit Buku :</b></label>
                                            <div class="col-md-9">
                                                <label id="lblPenerbitBuku" class="control-label"></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
										 <label class="col-md-3 control-label"><b>Tahun Penerbit :</b></label>
											<div class="col-md-9">
												<label id="lblTahunPenerbit" class="control-label"></label>
											</div>											
                                        </div>
										
										
										 <div class="form-group">
                                           <label class="col-md-3 control-label"><b>Stok :</b></label>
                                            <div class="col-md-9">
                                                <label id="lblStok" class="control-label"></label>
                                            </div>
                                        </div>
								
                                    </div>
 
                                </form>
                        </div>
                    </div>
                </div>
			</div>
