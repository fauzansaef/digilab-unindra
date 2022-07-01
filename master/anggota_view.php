<?php
	require_once "../functions.php";
	check_login();
	 $menu = 'data_master';
	 $submenu = 'master';
	 $page = 'anggota_view';
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
            <h1 class="page-title"><i class="fa fa-user"></i>&nbsp;&nbsp;Data Anggota Perpustakaan</h1> 
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
                                    <div class="table-toolbar" >
                                        <div class="form-group" >
                                            
                                            <div class="col-md-12">
                                                  <button id="btnTambahAnggota" class="btn sbold grey-mint" style="float :right">  <i class="fa fa-plus"></i>&nbsp; Tambah Anggota</button>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div id="sample_1_2_wrapper" class="dataTables_wrapper">

                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable" id="tblAnggota" role="grid" aria-describedby="sample_1_2_info">

                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> No </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Nama </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> NPM </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Jurusan </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> No Handphone </th>
                                                    <th tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Rendering engine : activate to sort column ascending" style="width: 140px;"> Alamat </th>
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

<div id="inputAnggotaModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Input Anggota</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-horizontal">
                                    <div class="form-body">
										<div class="form-group">
                                            <label class="col-md-3 control-label">NPM</label>
                                            <div class="col-md-4">
                                                <input type="text" id="txtNPM" class="form-control" placeholder="NPM">
                                            </div>
                                        </div>
									
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-4">
                                                <input type="text" id="txtNamaAnggota" class="form-control" placeholder="Nama Anggota">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan</label>
                                            <div class="col-md-4">
                                           <select class="table-group-action-input form-control input-inline" name ="ddlJurusan" id="ddlJurusan">
												<option selected>Pilih Jurusan</option>
												<option value="Teknik Informatika">Teknik Informatika</option>
												<option value="Teknik Komputer">Teknik Komputer</option>
												<option value="Teknologi Informasi">Teknologi Informasi</option>
											</select>
                                            </div>
                                        </div>
										
                                        <div class="form-group">
										 <label class="col-md-3 control-label">No Handphone</label>
											<div class="col-md-3">
											<div class="input-group">
											<span class="input-group-addon ">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="tel" id="txtNoHp" class="form-control" placeholder="No Handphone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
											</div>  
											</div>											
                                        </div>
										
										
										 <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat</label>
                                            <div class="col-md-4">
                                                <textarea type="text" id="txtAlamat" rows="5" class="form-control" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
								
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <button type="button" id="btnSimpanAnggota" class="btn btn-primary">Submit</button>
                                                <button type="button"  class="btn default" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
			</div>
			
			
			<div id="updateAnggotaModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Update Anggota</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-horizontal">
                                    <div class="form-body">
									   <div class="form-group" hidden>
                                           <label class="col-md-3 control-label">Id Anggota</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updIdAnggota" class="form-control"  placeholder="Nama Anggota" readonly>
                                            </div>
                                        </div>
									
									
									<div class="form-group">
                                            <label class="col-md-3 control-label">NPM</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updNPM" class="form-control" placeholder="NPM">
                                            </div>
                                        </div>
									
									
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-4">
                                                <input type="text" id="updNamaAnggota" class="form-control" placeholder="Nama Anggota">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan</label>
                                            <div class="col-md-4">
                                           <select class="table-group-action-input form-control input-inline" name ="updDdlJurusan" id="updDdlJurusan">
												<option selected>Pilih Jurusan</option>
												<option value="Teknik Informatika">Teknik Informatika</option>
												<option value="Teknik Komputer">Teknik Komputer</option>
												<option value="Teknologi Informasi">Teknologi Informasi</option>
											</select>
                                            </div>
                                        </div>
										
                                        <div class="form-group">
										 <label class="col-md-3 control-label">No Handphone</label>
											<div class="col-md-3">
											<div class="input-group">
											<span class="input-group-addon ">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <input type="tel" id="updNoHp" class="form-control" placeholder="No Handphone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
											</div>  
											</div>											
                                        </div>
										
										
										 <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat</label>
                                            <div class="col-md-4">
                                                <textarea type="text" id="updAlamat" rows="5" class="form-control" placeholder="Alamat"></textarea>
                                            </div>
                                        </div>
								
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-4">
                                                <button type="button" id="btnUpdateAnggota" class="btn btn-primary">Submit</button>
                                                <button type="button"  class="btn default" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
			</div>
			
			<div id="viewAnggotaModal" class="modal fade bs-modal-lg in" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">View Anggota</h4>
                        </div>
                        <div class="modal-body">
                            <form action="#" class="form-horizontal">
							
									<div class="form-group">
                                            <label class="col-md-3 control-label"><b>NPM :</b></label>
                                            <div class="col-md-9">
                                                <label id="lblNPM" class="control-label"></label>
                                            </div>
                                        </div>
							
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"><b>Nama :</b></label>
                                            <div class="col-md-9">
                                                <label id="lblNama" class="control-label"></label>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label"><b>Jurusan :</b></label>
                                            <div class="col-md-9">
												<label id="lblJurusan" class="control-label"></label>
                                            </div>
                                        </div>
										
                                        <div class="form-group">
										 <label class="col-md-3 control-label"><b>No Handphone :</b></label>
											<div class="col-md-9">
												<label id="lblNoHp" class="control-label"></label>
											</div>											
                                        </div>
										
										
										 <div class="form-group">
                                           <label class="col-md-3 control-label"><b>Alamat :</b></label>
                                            <div class="col-md-9">
                                                <label id="lblAlamat" class="control-label"></label>
                                            </div>
                                        </div>
								
                                    </div>
 
                                </form>
                        </div>
                    </div>
                </div>
			</div>
